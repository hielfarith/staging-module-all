<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Cronjob;
use App\Models\Project;
use App\Models\Reports\ReportApplication;
use App\Models\ProjectReportType;
use Carbon\Carbon;

class generateApplicationReportMonthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generateApplicationReportMonthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate Application Report Weekly';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $cron_start_date = Carbon::now()->format('Y-m-d H:i:s');
        DB::beginTransaction();

        try {
            
            $master_report_type_id = 3;

            $currentDate = Carbon::now()->startOfDay(); 
            $allProject = Project::all();
            foreach($allProject as $project){

                //If project doesnt have ticked this report type inside project settings, skip to next project
                $projectReportType = ProjectReportType::where('projects_id',$project->id)->where('master_report_type_id',$master_report_type_id)->first();
                if(!($projectReportType)){
                    continue;
                }
                
                //If project doesnt have start date and end_date, skip to next project
                if(!($project->start_date && $project->end_date)){
                    continue;
                }
                $startDateProject = Carbon::createFromFormat('Y-m-d',$project->start_date->format('Y-m-d'))->startOfDay();
                $endDateProject = Carbon::createFromFormat('Y-m-d',$project->end_date->format('Y-m-d'))->endOfDay();
                
                //new task
                //generate report helpdesk for missing month
                $allMonth = array();
                $start = clone $startDateProject;
                $end = clone $currentDate;
                if($currentDate->gt($endDateProject)){ //if current date is more than enddateproject, use end date 
                    $end = clone $endDateProject;
                }
                $end->lastOfMonth();
                while($start->lte($end)){
                    $allMonth[] = clone $start;
                    $start->addMonth()->startOfMonth();
                }
                
                foreach($allMonth as $month){

                    //Check if  month is within the start and end project date
                    if($month->between($startDateProject,$endDateProject)){
                                    
                        $currentMonthCount = ReportApplication::where('project_id',$project->id)->where('month',$month->format('n'))
                        ->where('year',$month->format('Y'))->count();
                        
                        //if report already exists in that month-year, skip to next project, else, generate report
                        if($currentMonthCount > 0 ){
                            continue;
                        }else{
                            
                            $newReport = new ReportApplication;
                            $newReport->project_id = $project->id;
                            $newReport->month = $month->format('n');
                            $newReport->year = $month->format('Y');
                            $newReport->title = "LAPORAN APLIKASI ". $project->name ." BAGI BULAN ". strtoupper($month->format('F Y'));
                            $newReport->title_original = $newReport->title;
                            $newReport->status = 0;
                            $newReport->save();

                            
                        }
                    }
                }
            }
            DB::commit();
            $cron_status = "Success";
            $cron_message = "";
            echo ("finished generate");
        } catch (\Throwable $e) {
            DB::rollback();
            $cron_status = "Failed";
            $cron_message = $e->getMessage();
            echo ("failed generate");
        }
        
        $cron_end_date = Carbon::now()->format('Y-m-d H:i:s');
		$cron_name = "Generate Application Report Monthly";
		$cron_job = new Cronjob;
		$cron_job->name = $cron_name;
		$cron_job->start_date = $cron_start_date;
		$cron_job->end_date = $cron_end_date;
		$cron_job->status = $cron_status;
		$cron_job->message = $cron_message;
		$cron_job->save();
        
        return 0;
    }
}
