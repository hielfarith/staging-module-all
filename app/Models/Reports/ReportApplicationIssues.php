<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ReportApplicationIssues extends Model
{
    use LogsActivity;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'report_application_issues';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $primaryKey = 'id';

    protected $casts = [
        'custom_data' => 'array'
    ];

    protected $dates = [
        'date_issued',
        'date_completed',
    ];

    public $fillable = [
        'id',
        'report_application_id',
        'explanation',
        'solution',
        'date_issued',
        'date_completed',
        'duration_completed',
        'status',
        'custom_data'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    public function reportApplication()
    {
        return $this->belongsTo('App\Models\Reports\ReportApplication', 'report_application_id', 'id');
    }

    public function masterStatus()
    {
        return $this->belongsTo('App\Models\Reports\ReportApplicationMasterStatus', 'status');
    }
}
