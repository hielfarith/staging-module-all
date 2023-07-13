<?php

namespace App\Models\PMReports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class PMSetting extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = 'pm_settings';

    protected $fillable = [
        'project_id',
        'start_month',
        'start_year',
        'months_to_gen',
        'start_date',
        'end_date',
    ];

    protected $primaryKey = 'id';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function pm_checklist()
    {
        return $this->hasMany('App\Models\PMReports\ChecklistPM','pm_setting_id','id');
    }

    public function serverList()
    {
        return $this->hasMany('App\Models\PMReports\ProjectServer','pm_setting_id','id');
    }

    public function month_type()
    {
        return $this->belongsTo('App\Models\Master\MasterMonth', 'start_month', 'id');
    }
}
