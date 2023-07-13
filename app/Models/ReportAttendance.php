<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ReportAttendance extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = 'report_attendances';

    /**
     * @var array
     */
    protected $fillable = ['id', 'project_id', 'week', 'month', 'year', 'prepared_by_name', 'confirmed_by_name', 'prepared_by_role', 'confirmed_by_role', 'prepared_sign_id', 'confirmed_sign_id', 'prepared_date', 'confirmed_date'];

    protected $primaryKey = 'id';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function getAttendanceDetails()
    {
        return $this->hasMany('App\Models\ReportAttendanceDetails', 'attendance_id', 'id');
    }

    public function uploadedFiles($docType = null)
    {
        return $this->hasMany(UploadedFile::class, 'borang_id','id')
        ->where('entity_type','ReportAttendance')
        ->when($docType != null, function($query) use($docType){ //if ada jenis doctype (panggil secara specifik), baru search for it. if not, cari untuk semua
            $query->where('doc_type',$docType);
        });
    }

    public function month_type() {
        return $this->belongsTo('App\Models\Master\MasterMonth', 'month', 'id');
    }

    /**
     * REQUIRED : project_id, year, month
     * OPTIONAL : user_id
     *
     * NOTE : Get all if user_id is null
     */
    public function eagerLoadMonthlyAttendance($project_id, $year, $month, $user_id = null)
    {
        return $this->with(['getAttendanceDetails','getAttendanceDetails.getTodayStaffAttendance' => function($staff) use ($user_id){
            if($user_id){
                $staff->where('user_id', $user_id);
            }
        }])
        ->where('project_id', $project_id)
        ->whereIn('week',[1,2,3,4,5])
        ->where('month', $month)
        ->where('year', $year)
        ->get();
    }

    public function email(){
        return $this->hasMany(Email::class, 'entity_id', 'id')
        ->where('entity_type', 'ReportAttendance');
    }
}
