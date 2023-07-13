<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ReportAttendanceStaff extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = 'report_attendance_staff';

    /**
     * @var array
     */
    protected $fillable = ['report_attendance_details_id', 'user_id', 'time_in', 'time_out', 'is_re', 'attended', 'note'];

    protected $primaryKey = 'id';

    // protected $dates = [
    //     'work_date',
    // ];

    // protected $dateFormat = 'date:d/m/Y';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }
    
    public function projectAttendance()
    {
        return $this->belongsTo('App\Models\ReportAttendanceDetails', 'report_attendance_details_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
