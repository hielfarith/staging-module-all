<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reports\ReportApplication;
use Illuminate\Support\Facades\Storage;



class ReportApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reportApplication;
    public $issueCount;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ReportApplication $reportApplication)
    {
        $this->reportApplication = $reportApplication;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->view('email_templates.reportApplication');

        $file = $this->reportApplication->uploadedFiles('final_pdf')->first();
        if($file){
            $filepath = $file->path;
            //Get name of file without uuid
            $filename = explode(".",Str::of($filepath)->basename(),2);
            $filename = end($filename);
            // dd($filename);

            //Get mimetype of file
            $correctfilepath = explode("/",Str::of($filepath),3);
            $correctfilepath = end($correctfilepath);
            // dd($correctfilepath);
            $mimetype = Storage::disk('uploads')->mimeType($correctfilepath);


            $mail->attach(public_path($filepath),[
                'as' => $filename,
                'mime' => $mimetype,
            ]);
        }
        
        return $mail;
    }
}
