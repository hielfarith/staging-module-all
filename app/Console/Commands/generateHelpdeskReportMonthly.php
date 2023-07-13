<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Cronjob;
use App\Models\Project;
use App\Models\Reports\ReportHelpdesk;
use App\Models\ProjectReportType;
use Carbon\Carbon;

class generateHelpdeskReportMonthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generateHelpdeskReportMonthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate Helpdesk Report Weekly';

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

            $master_report_type_id = 1;

            $report = ReportHelpdesk::first();
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

                        $currentMonthCount = ReportHelpdesk::where('project_id',$project->id)->where('month',$month->format('n'))
                        ->where('year',$month->format('Y'))->count();

                        //if report already exists in that month-year, skip to next project, else, generate report
                        if($currentMonthCount > 0 ){
                            continue;
                        }else{

                            //default start and end day of the current month
                            $startDay = clone $month;
                            $startDay->startOfMonth();

                            $endDay = clone $month;
                            $endDay->lastOfMonth();

                            //Check if current date have same month and year as start date
                            if($month->isSameMonth($startDateProject)){
                                $startDay = clone $startDateProject;

                                $endDay = clone $startDateProject;
                                $endDay->lastOfMonth();

                            }elseif($month->isSameMonth($endDateProject)){
                                $startDay = clone $endDateProject;
                                $startDay->startOfMonth();
                                $endDay = clone $endDateProject;

                            }

                            $weekCount = 1;
                            $isGenerateLastReport = false;

                            //create Monthly report (week = 0)
                            $newReport = new ReportHelpdesk;
                            $newReport->project_id = $project->id;
                            $newReport->week = 0;
                            $newReport->month = $startDay->format('n');
                            $newReport->year = $startDay->format('Y');
                            $newReport->start_date = $startDay->toDateTimeString();
                            $newReport->end_date = $endDay->toDateTimeString();
                            $newReport->title = "LAPORAN MEJA BANTU ". $project->name ." BAGI BULAN ". strtoupper($startDay->format('F Y'));
                            $newReport->title_original = $newReport->title;
                            $newReport->status = 0;
                            $newReport->save();

                            do{
                                $startDateReport = clone $startDay;
                                $endDateReport = $startDay->next(Carbon::FRIDAY);
                                //If the friday is still within end date project and in the same month, no need to change anything.
                                //else endDateReport is the endDateProject
                                if($endDateReport->lt($endDay) && $endDateReport->isSameMonth($month)){
                                //nothing
                                }else{
                                    $endDateReport = clone $endDay;
                                    $isGenerateLastReport = true;
                                }

                                $newReport = new ReportHelpdesk;
                                $newReport->project_id = $project->id;
                                $newReport->week = $weekCount;
                                $newReport->month = $startDateReport->format('n');
                                $newReport->year = $startDateReport->format('Y');
                                $newReport->start_date = $startDateReport->toDateTimeString();
                                $newReport->end_date = $endDateReport->toDateTimeString();
                                $newReport->title = "LAPORAN MEJA BANTU ". $project->name ." BAGI ". strtoupper($startDateReport->format('j F Y'))." - ". strtoupper($endDateReport->format('j F Y'));
                                $newReport->title_original = $newReport->title;
                                $newReport->status = 0;
                                $newReport->save();

                                $weekCount++;
                                $startDay->addDay();

                            }while(!$isGenerateLastReport);
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
		$cron_name = "Generate Helpdesk Report Monthly";
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
