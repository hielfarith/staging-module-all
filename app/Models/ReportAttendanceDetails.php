<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ReportAttendanceDetails extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = 'report_attendance_details';

    /**
     * @var array
     */
    protected $fillable = ['id', 'attendance_id', 'work_date'];

    protected $primaryKey = 'id';

    // protected $dates = [
    //     'work_date',
    // ];

    // protected $dateFormat = 'date:d/m/Y';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }
    
    public function getTodayStaffAttendance()
    {
        return $this->hasMany('App\Models\ReportAttendanceStaff', 'report_attendance_details_id', 'id');
    }

    // protected $dateFormat = 'date:d/m/Y';
    public function countAttended()
    {
        return $this->getTodayStaffAttendance->whereIn('attended',true)->count();
    }

    public function countNotAttended()
    {
        return $this->getTodayStaffAttendance->whereIn('attended',false)->count();
    }

    public function isExpired()
    {
        $today_date = Carbon::now();
        $work_date = Carbon::parse($this->work_date);
        // set to true if things already fixed
        $view = ($work_date->lte($today_date)) ? false : false;
        return $view;
    }

    public function reportAttendance()
    {
        return $this->belongsTo('App\Models\ReportAttendance', 'attendance_id');
    }


}
