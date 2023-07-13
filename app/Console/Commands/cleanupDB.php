<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Cronjob;
use App\Models\Project;
use App\Models\Reports\ReportHelpdesk;
use App\Models\ProjectReportType;
use Carbon\Carbon;

class cleanupDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:cleanupDB';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'cleaning up DB without data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   $this->info('Starting cleaning data');
        $tables = array('api_helpdesk_issues','api_logs','email','email_recipient','jobs','failed_jobs','cronjob','report_application','report_application_issues','report_attendance_details','report_attendance_staff','report_attendances','report_helpdesk','report_helpdesk_issues','sessions','uploaded_files');
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($tables as $table) {
            $this->info($table.' deleting....');
            DB::table($table)->truncate();
            $this->info($table.' deleted!');
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $this->info('Ended clean up <3');
        // php artisan iseed projects,role_has_permissions,permissions,roles,settings,users,model_has_permissions,model_has_roles,holiday,holiday_state,clients --force
    }
}
