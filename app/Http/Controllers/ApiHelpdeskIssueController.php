<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http as RequestHttp;
use Illuminate\Support\Facades\DB;

use App\Models\Project;
use App\Models\ApiHelpdeskIssues;
use App\Models\Master\MasterMonth;
use App\Models\Reports\ReportHelpdesk;

use App\Helpers;
use Carbon\Carbon;

class ApiHelpdeskIssueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function testApi(Request $request,Project $project)
    {
        $test = Helpers::RequestApi('GET','mystods',['year' => '2022', 'month' => '06']);
        dd($test);
    }

    public function retrieveAPIfromHelpdesk(Request $request, $project_id = null, $month = null, $year = null){

        try{
            if($project_id == null)
                return response()->json(['title' => 'No Data', 'status' => 'API can\'t retrieve']);

            if($project_id == "all"){
                $projects = Project::all();
            }else{
                $projects = Project::where('id',$project_id)->get();
            }
            $countNewTicket = 0;
            foreach($projects as $project){

                $response = Helpers::RequestApi('GET',$project->system_name,['year' => $year, 'month' => $month]);

                if(is_null($response) || ( isset($response->status) && ($response->status == 'error'))){
                    return response()->json(['title' => 'No Data', 'status' => 'success', 'detail' => 'API can\'t retrieve'],404);
                }else{
                    foreach($response->tickets as $ticket){

                        $issue = ApiHelpdeskIssues::where('api_id',$ticket->api_id)->where('project_id',$project->id)->first();
                        if($issue){

                        }else{
                            $issue = new ApiHelpdeskIssues;
                            $issue->api_id = $ticket->api_id;
                            $issue->project_id = $project->id;
                            $issue->month = $response->month;
                            $issue->year = $response->year;
                            $issue->title = $ticket->title;
                            $issue->explanation = strip_tags($ticket->explanation);
                            $issue->date_issued = Carbon::createFromFormat('Y-m-d H:i:s',$ticket->date_issued);
                            $issue->category = $ticket->category;
                            $issue->medium = $ticket->medium + 1;
                            $issue->tracking_id = $ticket->tracking_id;
                            $issue->nama_pengguna = $ticket->nama_pengguna;
                            $issue->issue_group = $ticket->issue_group;
                            $issue->date_response = $ticket->date_response ? Carbon::createFromFormat('Y-m-d H:i:s',$ticket->date_response) : null;
                            $issue->date_completed = $ticket->date_completed ? Carbon::createFromFormat('Y-m-d H:i:s',$ticket->date_completed) : null;
                            $issue->action = strip_tags($ticket->action);
                            $issue->data = $ticket;
                            $issue->save();
                            $countNewTicket++;
                        }
                    }
                }
            }

        } catch (\Throwable $e) {

            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        $detail = $countNewTicket > 0 ? "Terdapat ".$countNewTicket." data baru": "Tiada data baru";
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'detail' => $detail]);
    }


}
