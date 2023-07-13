<?php

namespace App\Models\PMReports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ProjectServer extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = 'pm_project_servers';

    /**
     * @var array
     */
    protected $fillable = [
        'pm_setting_id',
        'project_id',
        'address_id',
        'server_name',
        'server_brand',
        'serial_number',
        'cpu',
        'memory',
        'hdd',
        'tape_drive',
        'graphic_io',
        'power_supply',
        'other_io',
        'server_os',
        'server_kernal',
        'server_patches',
        'server_gateway',
        'server_dns',
        'ip_address_info',
        'server_hostname',
    ];

    protected $primaryKey = 'id';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    public function pm_setting()
    {
        return $this->belongsTo('App\Models\PMReports\PMSetting','pm_setting_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\PMReports\ServerAddress','address_id');
    }

    public function ip_address()
    {
        return $this->hasMany('App\Models\PMReports\ServerIP', 'project_server_id', 'id');
    }

    public function checklist()
    {
        return $this->hasMany('App\Models\PMReports\ServerChecklist', 'project_server_id', 'id');
    }

    // delete all that related
    public static function boot()
    {
        parent::boot();
        self::deleting(function($server) {
            foreach($server->ip_address()->get() as $ip_address){
                $ip_address->delete();
            }
        });
    }



    /**
     * REQUIRED : project_id, year, month
     * OPTIONAL : user_id
     *
     * NOTE : Get all if user_id is null
     */
    // public function eagerLoadMonthlyAttendance($project_id, $year, $month, $user_id = null)
    // {
    //     return $this->with(['getAttendanceDetails','getAttendanceDetails.getTodayStaffAttendance' => function($staff) use ($user_id){
    //         if($user_id){
    //             $staff->where('user_id', $user_id);
    //         }
    //     }])
    //     ->where('project_id', $project_id)
    //     ->whereIn('week',[1,2,3,4,5])
    //     ->where('month', $month)
    //     ->where('year', $year)
    //     ->get();
    // }
}
