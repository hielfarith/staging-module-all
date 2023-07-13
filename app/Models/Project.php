<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property integer $id
 * @property integer $clients_id
 * @property integer $project_id_ts
 * @property string $name
 * @property string $system_name
 * @property string $description
 * @property string $tender_no
 * @property string $sst_no
 * @property string $contract_no
 * @property string $start_date
 * @property string $end_date
 * @property string $project_cost
 * @property string $hd_api_url
 * @property string $objective
 * @property string $created_at
 * @property string $updated_at
 * @property ApiHelpdeskIssue[] $apiHelpdeskIssues
 * @property ProjectAbbreviation[] $projectAbbreviations
 * @property ProjectReportType[] $projectReportTypes
 * @property Client $client
 * @property ReportApplication[] $reportApplications
 * @property ReportAttendance[] $reportAttendances
 * @property ReportHelpdesk[] $reportHelpdesks
 * @property Ur[] $urs
 * @property UserProjectRole[] $userProjectRoles
 */
class Project extends Model
{
    use LogsActivity;

    /**
     * @var array
     */
    protected $fillable = ['clients_id',
        'project_id_ts',
        'name',
        'system_name',
        'description',
        'tender_no',
        'sst_no',
        'contract_no',
        'start_date',
        'end_date',
        'project_cost',
        'hd_api_url',
        'objective',
        'db_mysql_version',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apiHelpdeskIssues()
    {
        return $this->hasMany('App\Models\ApiHelpdeskIssue');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectAbbreviations($reportTypeId = null)
    {
        return $this->hasMany('App\Models\ProjectAbbreviation')
        ->when(!is_null($reportTypeId),function($query) use($reportTypeId){
            $query->where('master_report_type_id',$reportTypeId);
        })
        ->orderBy('abbreviation');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function objective($reportTypeId = null)
    {
        return $this->belongsTo('App\Models\ProjectObjective', 'id','project_id')
        ->when(!is_null($reportTypeId),function($query) use($reportTypeId){
            $query->where('master_report_type_id',$reportTypeId);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectReportTypes()
    {
        return $this->hasMany('App\Models\ProjectReportType', 'projects_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'clients_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reportApplications()
    {
        return $this->hasMany('App\Models\ReportApplication');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reportAttendances()
    {
        return $this->hasMany('App\Models\ReportAttendance');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reportHelpdesks()
    {
        return $this->hasMany('App\Models\ReportHelpdesk');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function urs()
    {
        return $this->hasMany('App\Models\Urs');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userProjectRoles()
    {
        return $this->hasMany('App\Models\UserProjectRole', 'projects_id');
    }

    public function pm_setting()
    {
        return $this->hasOne('App\Models\PMReports\PMSetting', 'project_id');
    }

    public function servers()
    {
        return $this->hasMany('App\Models\PMReports\ProjectServer','project_id');
    }

    public function server_location()
    {
        return $this->hasMany('App\Models\PMReports\ServerAddress','project_id');
    }

    public function pm_checklist()
    {
        return $this->hasMany('App\Models\PMReports\ChecklistPM','project_id');
    }

    public function issue_register()
    {
        return $this->hasMany('App\Models\IssueRegister','projects_id');
    }

    public function databases()
    {
        return $this->hasMany('App\Models\ProjectDatabase');
    }
}
