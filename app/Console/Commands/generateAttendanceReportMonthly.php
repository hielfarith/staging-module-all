<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Project;
use App\Models\Cronjob;
use App\Models\ReportAttendance;
use App\Models\ReportAttendanceDetails;
use App\Models\ReportAttendanceStaff;
use App\Models\UserProjectRole;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class generateAttendanceReportMonthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generateAttendanceReportMonthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To generate new report every month';

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
            $this->info('Time started : '.$cron_start_date);

            $projects = Project::all();
            $currentDate = Carbon::now()->startOfDay();
            $reportAttendance = ReportAttendance::first();

            foreach($projects as $project){
                //If project doesnt have start date and end_date, skip to next project
                $this->alert($project->name);
                $this->info('Checking project...');

                if(!($project->start_date && $project->end_date)){
                    $this->warn('Project '.$project->name.' doesnt have a start and end date. Skipping...');
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

                        $currentMonthCount = ReportAttendance::where('project_id',$project->id)->where('month',$month->format('n'))
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
                            $newReport = new ReportAttendance;
                            $newReport->project_id = $project->id;
                            $newReport->week = 0;
                            $newReport->month = $startDay->format('n');
                            $newReport->year = $startDay->format('Y');
                            $newReport->start_date = $startDay->toDateTimeString();
                            $newReport->end_date = $endDay->toDateTimeString();
                            $newReport->title = "LAPORAN KEHADIRAN PETUGAS MEJA BANTU ". $project->name ." BAGI BULAN ". strtoupper($startDay->format('F Y'));
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

                                $newReport = new ReportAttendance;
                                $newReport->project_id = $project->id;
                                $newReport->week = $weekCount;
                                $newReport->month = $startDateReport->format('n');
                                $newReport->year = $startDateReport->format('Y');
                                $newReport->start_date = $startDateReport->toDateTimeString();
                                $newReport->end_date = $endDateReport->toDateTimeString();
                                $newReport->title = "LAPORAN KEHADIRAN PETUGAS MEJA BANTU ". $project->name ." BAGI ". strtoupper($startDateReport->format('j F Y'))." - ". strtoupper($endDateReport->format('j F Y'));
                                $newReport->status = 0;
                                $newReport->save();


                                // create days
                                if(($weekCount >= 1) && ($weekCount <= 5)){
                                    $daysRange = CarbonPeriod::create($startDateReport->toDateTimeString(),$endDateReport->toDateTimeString());
                                    foreach( $daysRange as $day ){
                                        if($day->isWeekday()){
                                            $newDay = new ReportAttendanceDetails;
                                            $newDay->attendance_id = $newReport->id;
                                            $newDay->work_date = $day->toDateTimeString();
                                            $newDay->save();

                                            // Add staffs into the day
                                            $getAllStaff = $project->userProjectRoles()->whereIn('projects_id', array($project->id))->whereIn('master_project_role_id', ['1','2','3','4','5'])->get();
                                            if($getAllStaff->count() > 0){
                                                foreach($getAllStaff as $staff){
                                                    $addStaff = new ReportAttendanceStaff;
                                                    $addStaff->report_attendance_details_id = $newDay->id;
                                                    $addStaff->user_id = $staff->users_id;
                                                    $addStaff->save();
                                                }

                                            }else{
                                                continue;
                                            }
                                        }
                                    }
                                }

                                $this->warn('Month '.$startDateReport->format('n').' Week '.$weekCount.' has been generated.');
                                $weekCount++;
                                $startDay->addDay();



                            }while(!$isGenerateLastReport);
                        }
                    }
                }
                $this->info('Done...');
            }


            DB::commit();
            $cron_status = "Success";
            $cron_message = "";
            $this->info('Generated successfully');

        } catch(\Throwable $e){
            DB::rollback();
            $cron_status = "Failed";
            $cron_message = $e->getMessage();
            $this->error($cron_message);
        }

        $cron_end_date = Carbon::now()->format('Y-m-d H:i:s');
		$cron_name = "Generate Attendance Report Monthly";
		$cron_job = new Cronjob;
		$cron_job->name = $cron_name;
		$cron_job->start_date = $cron_start_date;
		$cron_job->end_date = $cron_end_date;
		$cron_job->status = $cron_status;
		$cron_job->message = $cron_message;
		$cron_job->save();
        $this->info('Time ended : '.$cron_end_date);
        return 0;
    }

    function isExist($int) {
        if ($int == 1) {
           return 'true';
        } else {
           return 'false';
        }
    }
}
