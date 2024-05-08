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
            // Retrieve the emails associated with reminders set to 0
            $emails = UserRolesReminder::getEmailsForReminder();

            if ($emails->isEmpty()) {
                $this->info('No reminders found.');
                return 0; // Command completed successfully
            }

            $emailData = DB::table('notifikasi_emel')
                ->where('Fungsi', 'NPE')
                ->where('Instrumen', 'SKIPS')
                ->where('Nombor', '25B')
                ->first();

            if ($emailData) {
                // Retrieve subject and message
                $subject = $emailData->Subject;
                $message = $emailData->Message;

                // Send email to each recipient
                foreach ($emails as $email) {
                    Mail::to($email)->send(new NotifikasiEmelFormDirect($message, $subject));
                }

                $this->info('Reminder emails sent successfully.');
            } else {
                $this->info('No email details found in the database.');
            }

            return 0; // Command completed successfully
        } catch (\Exception $e) {
            $this->error('Failed to check reminders. Error: ' . $e->getMessage());
            return 1; // Command failed
        }
    }
}