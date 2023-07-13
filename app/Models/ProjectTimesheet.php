<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $project_id
 * @property integer $ts_id
 * @property integer $ts_percentage
 * @property integer $ts_daily_rate
 * @property decimal $cost
 * @property string $ts_date
 * @property integer $ts_week
 * @property integer $ts_year
 * @property string $ts_submitted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Project $project
 */
class ProjectTimesheet extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'project_timesheet';

    public $dates = [
        'ts_date',
        'ts_submitted_at'
    ];

    /**
     * @var array
     */
    protected $fillable = ['project_id', 'ts_id', 'ts_percentage', 'ts_daily_rate', 'cost', 'ts_date', 'ts_week', 'ts_year', 'ts_submitted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
