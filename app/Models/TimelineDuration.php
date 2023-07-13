<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $projects_id
 * @property integer $year
 * @property string $start_date
 * @property string $end_date
 * @property string $created_at
 * @property string $updated_at
 * @property Timeline[] $timelines
 * @property Project $project
 */
class TimelineDuration extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'timeline_duration';

    /**
     * @var array
     */
    protected $fillable = ['projects_id', 'year', 'start_date', 'end_date', 'created_at', 'updated_at'];

    protected $dates = [
        'start_date',
        'end_date'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function timelines()
    {
        return $this->hasMany('App\Models\Timeline');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'projects_id');
    }
}
