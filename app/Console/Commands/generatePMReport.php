<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Project;
use App\Models\Cronjob;
use App\Models\PMReports\PMSetting;
use App\Models\PMReports\ChecklistPM;
use App\Models\PMReports\ProjectServer;
use App\Models\PMReports\ServerChecklist;
use App\Models\PMReports\HardwareChecklist;
use App\Models\PMReports\AdminToolChecklist;
use App\Models\PMReports\ResourcesChecklist;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Style\SymfonyStyle;

class generatePMReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generatePMReport';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To generate new PM checklist every 3rd or 4th month depending on its settings';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::beginTransaction();

        try {
            $cron_start_date = Carbon::now()->format('Y-m-d H:i:s');
            $this->info('TIME STARTED : '.$cron_start_date);

            $projects = Project::all();
            $current_date = clone Carbon::now()->startOfDay();

            foreach($projects as $project){
                //If project doesnt have start date and end_date, skip to next project
                $this->info("\n");
                $this->alert($project->name);
                $this->info('CHECKING PROJECT...');

                if(!($project->start_date && $project->end_date)){
                    $this->warn('PROJECT '.json_encode($project->name).' DOESNT HAVE A START AND END DATE. SKIP FOR NOW');
                    continue;
                }

                // 1st - check pm setting
                $pm_setting = null;
                if(is_null($project->pm_setting)){
                    $this->warn('UNABLE TO FIND PM SETTINGS. SKIP FOR NOW...');
                    continue;
                }else{
                    $pm_setting = $project->pm_setting;
                }

                // 2nd - check for location if it exists
                $server_location = null;
                if(!count($project->server_location)){
                    $this->warn('UNABLE TO FIND SERVER LOCATION. SKIP FOR NOW...');
                    continue;
                }else{
                    $server_location = $project->server_location;
                }

                // 3rd - check for server(s)
                $project_server = null;
                if(!count($project->servers)){
                    $this->warn('UNABLE TO FIND SERVER(S). SKIP FOR NOW...');
                    continue;
                }else{
                    $project_server = $project->servers;
                }

                if(($pm_setting == null) || ($server_location == null) || ($project_server == null)){
                    $this->warn('UNABLE TO PROCEED AS ONE OF MAIN SETTING IS MISSING. PLEASE MAKE SURE TO COMPLETELY SET SCHEDULER SETTINGS UNDER "PROJECT > PM SETTINGS".'."\n".'SKIP FOR NOW...');
                    continue;
                }

                /**------------ SET START AND END DATE -------------- */

                // get project start and end date
                $project_start_date = Carbon::createFromFormat('Y-m-d',$project->start_date->format('Y-m-d'))->startOfDay();
                $project_end_date   = Carbon::createFromFormat('Y-m-d',$project->end_date->format('Y-m-d'))->endOfDay();

                // get early/first pm setting date to be generated
                $start     = Carbon::createFromFormat('Y-m-d',$pm_setting->start_date)->startOfMonth()->startOfDay();
                $end       = clone $start;
                // get no of months to skip generate
                $months_to_add      = $pm_setting->months_to_gen - 1;

                // make suere the project is not expired
                if($project_end_date->lte($current_date)){
                    $this->warn('PROJECT HAS EXPIRED. SKIP FOR NOW..');
                    continue;
                }

                // check if pm setting is earlier than project starts
                if($current_date->lt($start)){
                    $this->warn('DATE IS EARLIER TFROM SETTINGS DATE. SKIP FOR NOW..');
                    continue;
                }

                $end = clone $end->addMonth($months_to_add)->endOfMonth()->endOfDay();


                // if current checklist exist get the start & end date
                $pm_checklist = null;
                if(count($project->pm_checklist)){
                    $start = null;
                    $end = null;
                    // get the latest row
                    $pm_checklist           = $project->pm_checklist()->latest()->first();
                    $get_start_checklist    = clone Carbon::createFromFormat('Y-m-d',$pm_checklist->start_date)->startOfDay();
                    $get_end_checklist      = clone Carbon::createFromFormat('Y-m-d',$pm_checklist->end_date)->endOfDay();

                    if(Carbon::now()->startOfDay()->between($get_start_checklist,$get_end_checklist)){
                        $this->warn('CURRENT CHECKLIST IS WITHIN RANGE OF [ '.$get_start_checklist->toDateTimeString().' ] UNTIL [ '.$get_end_checklist->toDateTimeString().' ]'."\n".'SKIP FOR NOW...');
                        continue;
                    }

                    $start                  = $get_end_checklist->addDay()->startOfDay();
                    $new_start              = clone $start;
                    $end                    = $new_start->addMonth($months_to_add)->endOfMonth()->endOfDay();
                }

                if($start->gt($project_end_date)){
                    $this->warn('PROJECT ENDED IN [ '.$project_end_date->toDateTimeString().' ]'."\n".'SKIP FOR NOW...');
                    continue;
                }

                // if end date is more than project_end_date, use project_end_date
                if($end->gt($project_end_date)){
                    $end                 = null;
                    $end                 = clone $project_end_date->endOfMonth()->endOfDay();
                }

                //generate pm report
                $new_pm_report = new ChecklistPM;
                $new_pm_report->title = 'LAPORAN PREVENTIVE MAINTENANCE REPORT';
                $new_pm_report->project_id = $project->id;
                $new_pm_report->pm_setting_id = $pm_setting->id;
                $new_pm_report->start_date = $start;
                $new_pm_report->end_date = $end;
                $new_pm_report->save();

                $this->info('GENERATED PM REPORT ID : [  ] : [START DATE] : '.$start->toDateTimeString().' | [END DATE] : '.$end->toDateTimeString());

                /**------------ GENERATE CHECKLIST BASED ON IP ADDRESS SETTINGS -------------- */

                // create new checklist
                foreach($project_server as $server){
                    $this->info("\n".'CHECKING SERVER : ['.json_encode($server->server_name).']');
                    // check if ip address exist in the server
                    if(!count($server->ip_address)){
                        $this->warn('UNABLE TO FIND IP ADDRESS OF THIS SERVER. SKIPPING...');
                        continue;
                    }else{
                        $ip_addresses = $server->ip_address;
                    }


                    // if ip address exist then generate checklist
                    $progress = $this->output->createProgressBar(count($ip_addresses));
                    foreach($ip_addresses as $key => $ip_address){
                        $progress->setMessage(' GENERATE CHECKLIST FOR IP : ['.json_encode($ip_address->ip_address).']');

                        // create new checklist
                        $new_checklist = new ServerChecklist;
                        $new_checklist->server_ip_id = $ip_address->id;
                        $new_checklist->checklist_id = $new_pm_report->id;
                        $new_checklist->status       = 1;
                        $new_checklist->save();

                        // create hardware cheklist
                        $new_hardware_checklist                         = new HardwareChecklist;
                        $new_hardware_checklist->server_checklist_id    = $new_checklist->id;
                        $new_hardware_checklist->save();

                        // create resource cheklist
                        $new_resources_checklist                        = new ResourcesChecklist;
                        $new_resources_checklist->server_checklist_id   = $new_checklist->id;
                        $new_resources_checklist->save();

                        // create admin tool cheklist
                        $new_admin_tool                                 = new AdminToolChecklist;
                        $new_admin_tool->server_checklist_id            = $new_checklist->id;
                        $new_admin_tool->save();

                        $progress->advance();
                    }
                    $progress->finish();
                    $this->info("\n");
                }
            }

            DB::commit();
            $cron_status = "Success";
            $cron_message = "";
            $this->info('CRON TASK DONE!');

        } catch(\Throwable $e){
            DB::rollback();
            $cron_status = "Failed";
            $cron_message = $e->getMessage();
            $this->error($cron_message);
        }

        $cron_end_date = Carbon::now()->format('Y-m-d H:i:s');
		$cron_name = "Generate Hardware Report Monthly";
		$cron_job = new Cronjob;
		$cron_job->name = $cron_name;
		$cron_job->start_date = $cron_start_date;
		$cron_job->end_date = $cron_end_date;
		$cron_job->status = $cron_status;
		$cron_job->message = $cron_message;
		$cron_job->save();
        $this->info('TIME ENDED : '.$cron_end_date);
        return 0;
    }

}
