<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Timeline;
use App\Models\TimelineDuration;
use App\Models\IssueRegister;
use Carbon\Carbon;

use DateTime;


class OperationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //INDEX
    public function index(Request $request)
    {
        // $projects = Project::paginate(2);
        $project = Project::find($request->project);
        //find request project ikut parameter dekat route. request->project_id
        // $yearDuration = $project->start_date->diffInYears($project->end_date);
        $timeline = Timeline::where('projects_id',$request->project)->paginate(10);
        $issueRegister = IssueRegister::where('projects_id',$request->project)->paginate(10);
        // $timeline_pagination =  Timeline::where('projects_id',$request->project)->paginate(5);
        // $timeline = TimelineDuration::find($request->project);
        // dd($timeline);


        return view('admin.project.operation.index', compact('project','timeline','timeline','issueRegister'));
    }

    public function store(Request $request, Project $project){

        $project = Project::find($request->project_id);
        $new_timeline = new Timeline;
        $new_timeline_duration = new TimelineDuration;


        $new_timeline_duration->projects_id = $request->project;
        $new_timeline_duration->start_date = $request->start_date;
        $new_timeline_duration->end_date = $request->end_date;
        $new_timeline_duration->save();

        // $date = Carbon::parse('2016-09-17 11:00:00');
        $date1 = Carbon::parse($request->start_date);
        $date2 = Carbon::parse($request->end_date);
        // $now = Carbon::now();
        // $diff = $date->diffInDays($now);
        $diff = $date1->diffInDays($date2);

        // dd($request->start_date);

        $new_timeline->timeline_duration_id = $new_timeline_duration->id;
        $new_timeline->projects_id = $request->project;
        $new_timeline->title = $request->task_name;
        $new_timeline->start_date = $request->start_date;
        $new_timeline->end_date = $request->end_date;
        $new_timeline->actual_start_date = $request->actual_start_date;
        $new_timeline->actual_end_date = $request->actual_end_date;
        $new_timeline->signee = $request->asignee;
        $new_timeline->duration = $diff;




        $new_timeline->save();

        return back(); //return redirect->back()

    }

    public function delete(Request $request,$qqq){
        $timeline = Timeline::where('id',$qqq)->first();
        $timeline->delete();
        return back();
    }

    public function store_issueRegister(Request $request){
        $project = Project::find($request->project);
        $issueRegister = IssueRegister::where('projects_id',$request->project)->get();

    }

    public function delete_issueRegister(Request $request){
        $project = Project::find($request->project);
        $issueRegister = IssueRegister::where('projects_id',$request->project)->get();

    }
}
