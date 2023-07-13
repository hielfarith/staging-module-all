<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ReportAttendance;
use App\Models\ReportAttendanceDetails;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReportAttendanceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reportAttendance;
    public $issueCount;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ReportAttendance $reportAttendance)
    {
        $this->reportAttendance = $reportAttendance;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $today = Carbon::now()->format('Y-m-d');
        $log = Log::build(['driver' => 'single','path' => storage_path('logs/'.$today.'/App/Mail/build.log'),]);
        $uuid = Str::uuid().' ';

        $mail = $this->view('email_templates.reportAttendance');

        // generate pdfs at first
        $test = app()->call('App\Http\Controllers\ReportAttendanceController@viewPDF', [
            'id'        => $this->reportAttendance->project->id,
            'type'      => 1 ,
            'option'    => 'team',
            'month'     => $this->reportAttendance->month
        ]);

        app()->call('App\Http\Controllers\ReportAttendanceController@viewPDF', [
            'id'        => $this->reportAttendance->project->id,
            'type'      => 1 ,
            'option'    => 're',
            'month'     => $this->reportAttendance->month
        ]);

        $log->info($uuid.'[ TEST CALL ] : ', [$test]);

        // TEAM
        $mail->attach(public_path().'/storage/'.$this->reportAttendance->project->name.'/report_attendance/'.$this->reportAttendance->year.'/'.$this->reportAttendance->month_type->name.'/LAPORAN KEHADIRAN TEAM '.$this->reportAttendance->project->name.'_'.$this->reportAttendance->project->id.'.pdf',[
            'mime' => 'application/pdf',
        ]);

        // RE
        $mail->attach(public_path().'/storage/'.$this->reportAttendance->project->name.'/report_attendance/'.$this->reportAttendance->year.'/'.$this->reportAttendance->month_type->name.'/LAPORAN KEHADIRAN PETUGAS MEJA BANTU '.$this->reportAttendance->project->name.'_'.$this->reportAttendance->project->id.'.pdf',[
            'mime' => 'application/pdf',
        ]);

        $log->info($uuid.'[ SEND EMAIL ] : ', [$mail]);

        return $mail;
    }
}
