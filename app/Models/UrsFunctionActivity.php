<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property integer $id
 * @property integer $urs_function_id
 * @property string $activity_ref
 * @property string $activity_name
 * @property string $activity_desc
 * @property string $activity_actor
 * @property string $activity_responsible
 * @property string $activity_frequency
 * @property string $activity_frequency_unit
 * @property string $activity_before
 * @property string $activity_after
 * @property string $activity_method_ops
 * @property string $activity_info_usage
 * @property string $activity_policy
 * @property string $activity_method_alt
 * @property string $activity_quality
 * @property string $activity_extra_note
 * @property string $created_at
 * @property string $updated_at
 * @property UrsFunction $ursFunction
 */
class UrsFunctionActivity extends Model
{
    use LogsActivity;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'urs_function_activity';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }
    
    /**
     * @var array
     */
    protected $fillable = ['urs_function_id', 'activity_ref', 'activity_name', 'activity_desc', 'activity_actor', 'activity_responsible', 'activity_frequency', 'activity_frequency_unit', 'activity_before', 'activity_after', 'activity_method_ops', 'activity_info_usage', 'activity_policy', 'activity_method_alt', 'activity_quality', 'activity_extra_note', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ursFunction()
    {
        return $this->belongsTo('App\Models\UrsFunction');
    }
}
