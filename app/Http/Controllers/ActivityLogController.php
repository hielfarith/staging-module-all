<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class ActivityLogController extends Controller
{
    public function index1 (Request $request)
    {
        $activityQuery = Activity::query();

        if ($request->event) {
            $activityQuery->where('event', $request->event);
        }

        if ($request->subject_type) {
            $activityQuery->where('subject_type', $request->subject_type);
        }

        if ($request->causer_id) {
            $activityQuery->where('causer_id', $request->causer_id);
        }

        if ($request->date_start) {
            $activityQuery->whereDate('created_at', '>=', $request->date_start);
        }

        if ($request->date_end) {
            $activityQuery->whereDate('created_at', '<=', $request->date_end);
        }

        $activityQuery->orderBy('created_at', 'DESC');
        $activities = $activityQuery->paginate(20);

        foreach ($activities as $activity) {
            $activity->setAttribute('activity_json', json_encode($activity->toArray()));
            $activity->setAttribute('causer_name', $activity->causer ? $activity->causer->name : '');
        }

        $events = Activity::select('event')->groupBy('event')->distinct()->get();
        $eventArr = [];
        foreach ($events as $event) {
            $eventArr[] = $event->event;
        }

        $subjectTypes = Activity::select('subject_type')->distinct()->get();
        $subjectTypeArr = [];
        foreach ($subjectTypes as $subjectType) {
            $subjectTypeArr[] = $subjectType->subject_type;
        }

        $users = User::get();

        return view('admin.log.index', compact('request', 'activities', 'eventArr', 'subjectTypeArr', 'users'));
    }

    // public function index (Request $request)
    // {
    //     $activityQuery = Activity::query();

    //     if ($request->event) {
    //         $activityQuery->where('event', $request->event);
    //     }

    //     if ($request->subject_type) {
    //         $activityQuery->where('subject_type', $request->subject_type);
    //     }

    //     if ($request->causer_id) {
    //         $activityQuery->where('causer_id', $request->causer_id);
    //     }

    //     if ($request->date_start) {
    //         $activityQuery->whereDate('created_at', '>=', $request->date_start);
    //     }

    //     if ($request->date_end) {
    //         $activityQuery->whereDate('created_at', '<=', $request->date_end);
    //     }

    //     $activityQuery->orderByDesc('created_at');
    //     $activities = clone $activityQuery;

    //     foreach ($activities as $activity) {
    //         $activity->setAttribute('activity_json', json_encode($activity->toArray()));
    //         $activity->setAttribute('causer_name', $activity->causer ? $activity->causer->name : '');
    //     }

    //     if ($request->ajax()) {

    //         return datatables()->of($activities)
    //             ->editColumn('id', function ($activities){
    //                 return $activities->id;
    //             })
    //             ->editColumn('event', function ($activities){
    //                 $label = '';

    //                 if ($activities->event == 'created'){
    //                     $label .= '<span class="badge rounded-pill bg-light-primary mb-1">Created</span>';
    //                 }
    //                 else if ($activities->event == 'updated'){
    //                     $label .= '<span class="badge rounded-pill bg-light-warning mb-1">Updated</span>';
    //                 }
    //                 else if ($activities->event == 'deleted'){
    //                     $label .= '<span class="badge rounded-pill bg-light-danger mb-1">Deleted</span>';
    //                 }

    //                 $label .= '<br>';
    //                 $label .= $activities->subject_type;

    //                 return $label;
    //             })
    //             ->editColumn('causer', function ($activities){
    //                 return $activities->causer ? $activities->causer->name : '';
    //             })
    //             ->editColumn('created_at', function ($activities){
    //                 return $activities->created_at->format('d/m/Y h:ia') ;
    //             })
    //             ->editColumn('action', function ($activities){
    //                 // foreach($activities as $activity){
    //                     $button = '';
    //                     // $button .= '<button type="button" class="btn btn-sm btn-default btnViewLog" data-activity="'. $activities->activity_json.'" data-properties="'. $activities->properties.'">';
    //                     $button .= '<a href="javascript:void(0);" class="btn btn-xs btn-default" onclick="viewActivityLog('.$activities->id.')" data-activity="'. $activities->activity_json.'" data-properties="'. $activities->properties.'">';
    //                     $button .= '<i class="fas fa-eye"></i>';
    //                     $button .= '</button';

    //                 return $button;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }

    //     $events = Activity::select('event')->groupBy('event')->distinct()->get();
    //     $eventArr = [];
    //     foreach ($events as $event) {
    //         $eventArr[] = $event->event;
    //     }

    //     $subjectTypes = Activity::select('subject_type')->distinct()->get();
    //     $subjectTypeArr = [];
    //     foreach ($subjectTypes as $subjectType) {
    //         $subjectTypeArr[] = $subjectType->subject_type;
    //     }

    //     $users = User::get();

    //     return view('admin.log.index', compact('request', 'activities', 'eventArr', 'subjectTypeArr', 'users'));
    // }

    public function index(Request $request)
    {
        $activities = Activity::orderBy('created_at', 'DESC')->paginate(20);
        $eventArr = $activities->unique('event')->pluck('event');
        $subjectTypeArr = $activities->unique('subject_type')->pluck('subject_type');
        $causer_id = $activities->unique('causer_id')->pluck('causer_id');
        $users = User::whereIn('id',$causer_id)->get();

        return view('admin.log.index', compact([
            'activities',
            'eventArr',
            'subjectTypeArr',
            'users',
        ]));
    }
}
