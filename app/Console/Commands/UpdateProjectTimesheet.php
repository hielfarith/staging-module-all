<?php

namespace App\Console\Commands;

use App\Models\ApiLogs;
use App\Models\Project;
use App\Models\ProjectTimesheet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UpdateProjectTimesheet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:project-timesheet {init?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Call timesheet API to update records';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $init = $this->argument('init');
        $initStr = '';
        if ($init) {
            $initStr = '?startDate=2021-01-01';
        }

        // $accessToken = TimesheetApiHelper::getAccessToken();
        // dd($accessToken);

        // $headers = [
        //     'Authorization' => 'Bearer ' . $accessToken,
        //     'Accept' => 'application/json',
        // ];

        $time_requested = Carbon::now();
        $apiUrl = config('timesheet.base_url') . '/timesheet' . $initStr;

        $status = "";
        $responseJson = "[]";
        $projectArr = Project::whereNotNull('project_id_ts')->get()->pluck('id', 'project_id_ts')->toArray();

        try {

            $response = Http::timeout(600)->get($apiUrl);
            $responseJson = $response->json();
            $responseObj = (object) $responseJson;

            if ($responseObj->success) {

                $timesheets = $responseObj->data;

                foreach ($timesheets as $timesheet) {
                    $timesheet = (object) $timesheet;

                    if ($timesheet->project && $timesheet->user) {
                        $tsUser = (object) $timesheet->user;
                        $tsProject = (object) $timesheet->project;

                        $user = User::firstOrNew(['email' => $tsUser->email]);
                        if (!$user->exists) {
                            $user->name = $tsUser->name;
                            $user->email = $tsUser->email;
                            $user->isClient = 0;
                            $user->password = Hash::make('password');
                            $user->is_active = 0;
                            $user->google_id = "-";
                            $user->save();
                        }

                        if (isset($projectArr[$tsProject->id])) {

                            $projectID = $projectArr[$tsProject->id];

                            $projectTimesheet = ProjectTimesheet::firstOrNew(['ts_id' => $timesheet->id]);

                            $projectTimesheet->project_id = $projectID;
                            $projectTimesheet->user_id = $user->id;
                            $projectTimesheet->ts_id = $timesheet->id;
                            $projectTimesheet->ts_percentage = $timesheet->percentage;
                            $projectTimesheet->ts_daily_rate = $timesheet->daily_rate;
                            $projectTimesheet->cost = ($projectTimesheet->ts_percentage / 100) * $projectTimesheet->ts_daily_rate;
                            $projectTimesheet->ts_date = $timesheet->timesheet_date_str;
                            $projectTimesheet->ts_week = $timesheet->week;
                            $projectTimesheet->ts_year = $timesheet->year;
                            $projectTimesheet->ts_submitted_at = $timesheet->submitted_at_str;

                            $projectTimesheet->save();
                        }
                    }
                }
            }

            $status = "SUCCESS";
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            $status = "FAILED";
        }

        $apiLog = new ApiLogs;
        $apiLog->system = "timesheet";
        $apiLog->url = $apiUrl;
        $apiLog->method = "GET";
        $apiLog->time_request = $time_requested;
        $apiLog->time_receive = Carbon::now();
        $apiLog->status = $status;
        $apiLog->value = json_encode($responseJson);
        $apiLog->save();
    }
}
