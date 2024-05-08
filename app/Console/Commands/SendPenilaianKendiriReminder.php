<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifikasiEmelFormDirect;
use App\Models\UserRolesReminder;



class SendPenilaianKendiriReminder extends Command  
{
    protected $signature = 'reminder:24hours';

    protected $description = 'Check for reminders and send emails if needed';

    public function handle()
    {
        try {
            // Retrieve the emails associated with reminders for 7 days before FormFinalDate
            $emails7 = UserRolesReminder::getEmailsForReminder()['emails7'];
            // Retrieve the emails associated with reminders for 1 day before FormFinalDate
            $emails1 = UserRolesReminder::getEmailsForReminder()['emails1'];

            // Sending reminders for 7 days before FormFinalDate
            if (!$emails7->isEmpty()) {
                $emailData7 = DB::table('notifikasi_emel')
                    ->where('Fungsi', 'NPE')
                    ->where('Instrumen', 'SKIPS')
                    ->where('Nombor', '25A')
                    ->first();

                if ($emailData7) {
                    $subject7 = $emailData7->Subject;
                    $message7 = $emailData7->Message;

                    foreach ($emails7 as $email) {
                        Mail::to($email)->send(new NotifikasiEmelFormDirect($message7, $subject7));
                    }

                    $this->info('Reminder emails for 7 days before FormFinalDate sent successfully.');
                } else {
                    $this->info('No email details found for 7 days before FormFinalDate.');
                }
            } else {
                $this->info('No reminders found for 7 days before FormFinalDate.');
            }

            // Sending reminders for 1 day before FormFinalDate
            if (!$emails1->isEmpty()) {
                $emailData1 = DB::table('notifikasi_emel')
                    ->where('Fungsi', 'NPE')
                    ->where('Instrumen', 'SKIPS')
                    ->where('Nombor', '25B')
                    ->first();

                if ($emailData1) {
                    $subject1 = $emailData1->Subject;
                    $message1 = $emailData1->Message;

                    foreach ($emails1 as $email) {
                        Mail::to($email)->send(new NotifikasiEmelFormDirect($message1, $subject1));
                    }

                    $this->info('Reminder emails for 1 day before FormFinalDate sent successfully.');
                } else {
                    $this->info('No email details found for 1 day before FormFinalDate.');
                }
            } else {
                $this->info('No reminders found for 1 day before FormFinalDate.');
            }

            return 0; // Command completed successfully
        } catch (\Exception $e) {
            $this->error('Failed to check reminders. Error: ' . $e->getMessage());
            return 1; // Command failed
        }
    }



}


       