<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property integer $id
 * @property integer $projects_id
 * @property integer $master_report_type_id
 * @property string $created_at
 * @property string $updated_at
 * @property MasterReportType $masterReportType
 * @property Project $project
 */
class ProjectReportType extends Model
{
    use LogsActivity;

    /**
     * @var array
     */
    protected $fillable = ['projects_id', 'master_report_type_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function masterReportType()
    {
        return $this->belongsTo('App\Models\MasterReportType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'projects_id');

    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function objective()
    {
        return $this->belongsTo('App\Models\ProjectObjective', 'id', 'project_report_type_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }
}
