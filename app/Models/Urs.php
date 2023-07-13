<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property integer $id
 * @property integer $project_id
 * @property string $doc_ref
 * @property string $doc_date
 * @property string $doc_version
 * @property string $created_at
 * @property string $updated_at
 * @property Project $project
 * @property UrsContent[] $ursContents
 * @property UrsFunction[] $ursFunctions
 */
class Urs extends Model
{
    use LogsActivity;

    /**
     * @var array
     */
    protected $fillable = ['project_id', 'doc_ref', 'doc_date', 'doc_version', 'created_at', 'updated_at'];

    protected $dates = [
        'doc_date',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ursCheckVerifies()
    {
        return $this->hasMany('App\Models\UrsCheckVerify', 'urs_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ursContents()
    {
        return $this->hasMany('App\Models\UrsContent', 'urs_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ursFunctions()
    {
        return $this->hasMany('App\Models\UrsFunction', 'urs_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ursVersions()
    {
        return $this->hasMany('App\Models\UrsVersion', 'urs_id');
    }
}
