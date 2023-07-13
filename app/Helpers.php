<?php

namespace App;

use Cache;
use App\Models\Settings;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Models\UploadedFile;
use App\Models\ApiLogs;
use App\Models\Project;
use DB;
use Illuminate\Support\Facades\Storage;
use Session;

class Helpers
{
    /**
     * Fetch Cached settings from database
     *
     * @return string
     */

    public static function settings($key)
    {
        $cache = null;
        $cache = Cache::get('settings')->where('key', $key)->first();

        return $cache->value ?? null;
    }


    static function uploadFile($entity_type, array $array, $docType = NULL, $borangId = '')
    {
        DB::beginTransaction();
        try {

            //put the doctype that required the original name of file
            $originalNameRequired = ['final_pdf'];
            foreach ($array as $key => $value) {

                if(filesize($value)>3000000){
                    Session::flash('error', 'Fail hendaklah kurang daripada 3MB.');
                    return "false";
                }

                if(!in_array($value->getClientOriginalExtension(),['pdf','png','jpeg','jpg','docx'])){
                    Session::flash('error', 'Fail hendaklah dalam format png, jpeg, jpg, docx dan pdf sahaja.');
                    return "false";
                }

                $now = Carbon::now();
                $uuid = Uuid::uuid4();

                //Naming Section
                if(in_array($docType,$originalNameRequired)){
                    $filename = $uuid.".".pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME).".".$value->getClientOriginalExtension();

                }else{
                    $filename = $uuid.".".$docType.".".$value->getClientOriginalExtension();

                }

                $imagePath = Storage::disk('uploads')->putFileAs($entity_type, $value, $filename);
                $input['id'] = $uuid;
                $input['entity_type'] = $entity_type;
                $input['doc_type'] = $docType;
                $input['path'] = 'storage/uploads/' . $imagePath;
                $input['borang_id'] = $borangId; //boleh jadi id untuk specific laporan.
                $input['uploaded_by'] = \Auth::user()->id;
                $input['created_at'] = $now;
                $input['updated_at'] = $now;

                $uploadedFile = UploadedFile::create($input);

                if (!$uploadedFile) {
                    throw new Exception("Error Processing Request", 1);
                }
            }
            DB::commit();

            return "success";
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    static function deleteFile($path){
        $newPath = str_replace("storage/uploads/","",$path); //removed Unused Part Path
        $exists = Storage::disk('uploads')->exists($newPath);
        if($exists){
            Storage::disk('uploads')->delete($newPath);
        }
        return $exists;

    }

    /*
     *  Fetch Mimetype of File of UploadFiles
     *  Example: ReportApplicationController@viewFinalFile
     *
     *  Input: file retrieved from method UploadedFiles
     *
     *  @return string
    */


    static function getMimeTypeFromFile($file){

        //Get mimetype of file
        $correctfilepath = explode("/",Str::of($file->path),3);
        $correctfilepath = end($correctfilepath);
        
        // dd($correctfilepath);
        $mimeType = false;
        $mimeType = Storage::disk('uploads')->mimeType($correctfilepath);

        return $mimeType;
    }

    /**
     * [ REQUIRED ] method = GET, POST
     * [ REQUIRED ] system_name 'mystods' , 'etuis'
     *
     * [ OPTIONAL ] data array['month' => $month, 'year' => $year]
     * [ OPTIONAL ] endpoint = /api/ticket
     * [ OPTIONAL ] auth true/false
     *
     * !! Open for improvement. Do improve this if necessary. Thanks :) !!
     */
    static function RequestApi($method = 'POST', $system_name = null, array $data = null, $endpoint = null, $auth = false)
    {
        $today = Carbon::now()->format('Y-m-d');
        $log = Log::build(['driver' => 'single','path' => storage_path('logs/'.$today.'/Helper/request.log'),]);
        $uuid = Str::uuid();

        $time_requested = Carbon::now()->format('Y-m-d H:i:s');
        $log->info($uuid.' [ Time requested ] : '.$time_requested);

        $client = new \GuzzleHttp\Client(['verify' => false]);
        $log->info($uuid.' [ Client ] : ',[$client]);

        $api_name = $system_name;
        switch ($system_name){
            case 'mystods' :
                    $log->info($uuid.' [ System name ] : '.$api_name);
                    $project = Project::find(1); // 1 - mystods

                    // retrieve api url
                    if(env('MYSTODS_URL')){
                        $request_url = env('MYSTODS_URL');
                    }else{
                        $request_url = $project->hd_api_url;
                    }

                    // to check if endpoint exist
                    if($endpoint){
                        $request_url .= $endpoint;
                    }

                    // set auth key if set
                    if(($auth) && (env('MYSTODS_KEY'))){
                        $request_url .= '?key='.env('MYSTODS_KEY');
                    }

                    // if there are other parameters for url
                    // these are required fields for mystods
                    if(isset($data['month'])){
                        $request_url .= '&month='.$data['month'];
                    }

                    if(isset($data['year'])){
                        $request_url .= '&year='.$data['year'];
                    }

                    $log->info($uuid.' [ '.$method.' ] : '.$request_url);
                    $request = $client->request($method,$request_url);

                    $time_received = Carbon::now()->format('Y-m-d H:i:s');
                    $log->info($uuid.' [ Time received ] : '.$time_received);

                    $response = json_decode($request->getBody()->getContents());
                    $log->info($uuid.' [ Response ] : ',[$response]);

                    $status = $request->getStatusCode();
                    if(isset($response->status) && ($response->status == 'error')){
                        $status = 500;
                    }
                    $log->info($uuid.' [ Status ] : '.$status);
                    $api_status = ($status == 200) ? 'success' : 'failed';
                break;
            case 'etuis' :
                    $log->info($uuid.' [ System name ] : '.$api_name);
                    $project = Project::find(2); // 2 - etuis

                    // retrieve api url
                    if(env('ETUIS_URL')){
                        $request_url = env('ETUIS_URL');
                    }else{
                        $request_url = $project->hd_api_url;
                    }

                    // to check if endpoint exist
                    if($endpoint){
                        $request_url .= $endpoint;
                    }

                    // set auth key if set
                    if(($auth) && (env('ETUIS_KEY'))){
                        $request_url .= '?key='.env('ETUIS_KEY');
                    }

                    // if there are other parameters for url
                    // these are required fields for mystods
                    if(isset($data['month'])){
                        $request_url .= '&month='.$data['month'];
                    }

                    if(isset($data['year'])){
                        $request_url .= '&year='.$data['year'];
                    }

                    $log->info($uuid.' [ '.$method.' ] : '.$request_url);
                    $request = $client->request($method,$request_url);

                    $time_received = Carbon::now()->format('Y-m-d H:i:s');
                    $log->info($uuid.' [ Time received ] : '.$time_received);

                    $response = json_decode($request->getBody()->getContents());
                    $log->info($uuid.' [ Response ] : ',[$response]);

                    $status = $request->getStatusCode();
                    if(isset($response->status) && ($response->status == 'error')){
                        $status = 500;
                    }
                    $log->info($uuid.' [ Status ] : '.$status);
                    $api_status = ($status == 200) ? 'success' : 'failed';
                break;
            case '' :
                $log->info($uuid.' [ System name ] : '.$api_name);

                $url = (env('CUSTOM_URL')) ? env('CUSTOM_URL') : 'https://example.com';
                if(env('CUSTOM_TOKEN')){
                    $headers = [
                        'Authorization' => 'Bearer ' . env('CUSTOM_TOKEN'),
                        'Accept'        => 'application/json',
                    ];
                }
                $request = $client->request($request,$url.$endpoint,[
                    //'headers' => [ 'Authorization' => 'Bearer ' . $publicKey ],
                    //'body' => json_encode($data),
                ]);
                break;

            default:
                return null;
        }


        $api_job = new ApiLogs;
        $api_job->system = $api_name;
        $api_job->url = $request_url;
        $api_job->method = $method;
        $api_job->time_request = $time_requested;
        $api_job->time_receive = isset($time_received) ? $time_received : Carbon::now()->format('Y-m-d H:i:s');
        $api_job->status = $api_status;
        $api_job->value = json_encode($response);
        $api_job->save();

        return $response;
    }
}
