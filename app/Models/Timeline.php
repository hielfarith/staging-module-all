<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $projects_id
 * @property integer $timeline_duration_id
 * @property string $title
 * @property string $start_date
 * @property string $end_date
 * @property integer $duration
 * @property float $baseline
 * @property integer $is_pillar
 * @property integer $is_sub_item
 * @property integer $is_milestone
 * @property float $actual
 * @property float $difference
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property Project $project
 * @property TimelineDuration $timelineDuration
 */
class Timeline extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'timeline';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['projects_id', 'timeline_duration_id', 'title', 'start_date', 'end_date', 'duration', 'baseline', 'is_pillar', 'is_sub_item', 'is_milestone', 'actual', 'difference', 'status', 'created_at', 'updated_at'];

    protected $dates = [
        'start_date',
        'end_date'
    ];
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
    public function timelineDuration()
    {
        return $this->belongsTo('App\Models\TimelineDuration');
    }
}
