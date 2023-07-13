<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property integer $id
 * @property integer $urs_id
 * @property integer $section_id
 * @property string $section_name
 * @property string $section_content
 * @property integer $is_active
 * @property string $created_at
 * @property string $updated_at
 * @property Ur $ur
 */
class UrsContent extends Model
{
    use LogsActivity;

    /**
     * @var array
     */
    protected $fillable = ['urs_id', 'section_id', 'section_name', 'section_content', 'is_active', 'created_at', 'updated_at'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function urs()
    {
        return $this->belongsTo('App\Models\Urs', 'urs_id');
    }
}
