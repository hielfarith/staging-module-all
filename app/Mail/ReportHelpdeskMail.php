<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reports\ReportHelpdesk;
use App\Models\Reports\ReportHelpdeskIssues;

class ReportHelpdeskMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reportHelpdesk;
    public $issueCount;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ReportHelpdesk $reportHelpdesk,$issueCount)
    {
        $this->reportHelpdesk = $reportHelpdesk;
        $this->issueCount = $issueCount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        $mail = $this->view('email_templates.reportHelpdesk');

        if($this->issueCount > 0){
            $mail->attach(public_path().$this->reportHelpdesk->url_pdf,[
                'mime' => 'application/pdf',
            ]);
        }
        return $mail;
    }
}
