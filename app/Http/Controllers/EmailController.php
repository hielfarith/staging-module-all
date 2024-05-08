<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\EmailRecipient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifikasiEmelFormDirect;
use Illuminate\Support\Facades\Http;

class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*^
     "entity_type" => "ReportHelpdesk"
    "entity_id" => "31"
    "email_type" => "TO"
    "email" => "dasdas"

    */

    //Add email, and refresh the email list uptodate
    public function addEmail(Request $request){

        try{

            $validatedData = $request->validate([
                'email' => ['email'],
            ],[
                'email.email' => "Not a valid email address",
            ]);


            $email = Email::where('entity_type',$request->entity_type)->where('entity_id',$request->entity_id)->first();
            if(!$email){
                $email = new Email(['entity_type' => $request->entity_type, 'entity_id' => $request->entity_id]);
                $email->save();
            }

            $emailRecipient = new EmailRecipient;
            $emailRecipient->email_id = $email->id;
            $emailRecipient->type = $request->email_type;
            $emailRecipient->email = $request->email;
            $emailRecipient->save();

            $emailArray = array();
            if($request->email_type == "TO"){
                foreach($email->emailRecipientTo as $recipient){
                    $emailArray[] = $recipient->email;
                }
            }elseif($request->email_type == "CC"){
                foreach($email->emailRecipientCc as $recipient){
                    $emailArray[] = $recipient->email;
                }
            }elseif($request->email_type == "BCC"){
                foreach($email->emailRecipientBcc as $recipient){
                    $emailArray[] = $recipient->email;
                }
            }


        } catch (Throwable $exception) {
            Log::error($exception);
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'email' => $emailArray]);

    }

    public function deleteEmail(Request $request){

        try{
            EmailRecipient::destroy($request->email_recipient_id);

        } catch (Throwable $exception) {
            Log::error($exception);
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        return response()->json(['title' => 'Berjaya', 'status' => 'success']);

    }
    
// Assume hantarNotifikasiEmel function is defined elsewhere







public function KPMHantarData(Request $request)
{   
    $jawatan = $request->input('jawatan', 'pengetua');
    $instrumen = $request->input('instrumen', 'SKPAK');
    $role = $request->input('role', 'Pentadbir Bahagian BPSH');
    $fungsi = $request->input('fungsi', 'NPE');
    $nombor = $request->input('nombor', '01');

    
    //$dynamicData = $request->except(['jawatan', 'instrumen', 'role', 'fungsi', 'nombor']); //Untuk input yang dynamic dari client, x tahu form dia akan guna mana , input apa
    $dynamicData = [
        'tahun' => '2004',
        'tarikhmulapengisian' => null,
        'tarikhakhirpengisian' => null,
        'pautan' => null,
        'tarikh' => '24 Jun',
        'masa' => '9 AM - 9 PM',
        'medium' => 'webex',
    ];


    // Perlu amend ikut DB sebenar
    $user = DB::table('sppip.user_roles')
                ->where('jawatan', $jawatan)
                ->where('instrumen', $instrumen)
                ->where('role', $role)
                ->first(); // perlu amend untuk extract multiple email

    if ($user) {
        $toEmail = $user->email;
        $parameters = array_merge([
            'fungsi' => $fungsi,
            'instrumen' => $instrumen,
            'nombor' => $nombor,
            'toEmail' => $toEmail,
        ], $dynamicData);
        return redirect()->route('hantar-emel-notifikasi', $parameters);
    } else {
        error_log("KPMHantarData error: User not found or database query failed");
    }
}


//pre-requisite, input fungsi, instrumen, nombor
public function hantarNotifikasiEmel(Request $request)
{
    // Retrieve parameters from the request
    $inputData = $request->all();

    // Retrieve email data from the database
    $DataNotifikasi = DB::table('Notifikasi_Emel')
        ->where('Fungsi', $inputData['fungsi'])
        ->where('Instrumen', $inputData['instrumen'])
        ->where('Nombor', $inputData['nombor'])
        ->first();

    if ($DataNotifikasi) {
        // Replace placeholders with actual values
        $htmlContent = $DataNotifikasi->Message;
        foreach ($inputData as $placeholder => $value) {
            if ($value !== null && is_string($value)) {
                $htmlContent = str_replace('{{ $' . $placeholder . ' }}', $value, $htmlContent);
            }
        }

        // Convert newlines to <br> tags if needed
        $htmlContent = nl2br($htmlContent);

        $subject = $DataNotifikasi->Subject;

        // Send email with formatted message and subject
        $response = Mail::to($inputData['toEmail'])->send(new NotifikasiEmelFormDirect($htmlContent, $subject));

        return response()->json(['title' => 'Berjaya', 'status' => 'success']);
    } else {
        return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => 'Email data not found'], 404);
    }
}



