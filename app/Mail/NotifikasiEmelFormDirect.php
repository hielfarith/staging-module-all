<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifikasiEmelFormDirect extends Mailable
{
    use Queueable, SerializesModels;

    public $mailmessage;
    public $subject;

    public function __construct($message, $subject)
    {
        $this->mailmessage = $message;
        $this->subject = $subject;
    }

    public function build()
    {
        return $this->view('Notifikasi.NotifikasiEmelForm');
    }
}
