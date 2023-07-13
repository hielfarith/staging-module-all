<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property integer $id
 * @property integer $urs_id
 * @property string $func_ref
 * @property string $func_desc
 * @property string $func_img
 * @property string $func_img_desc
 * @property string $created_at
 * @property string $updated_at
 * @property UrsFunctionActivity[] $ursFunctionActivities
 * @property Ur $ur
 */
class UrsFunction extends Model
{
    use LogsActivity;

    /**
     * @var array
     */
    protected $fillable = ['urs_id', 'func_ref', 'func_desc', 'func_img', 'func_img_desc', 'created_at', 'updated_at'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($ursFunction) {
            $ursFunction->ursFunctionActivities()->delete();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ursFunctionActivities()
    {
        return $this->hasMany('App\Models\UrsFunctionActivity')->orderBy('activity_seq');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function urs()
    {
        return $this->belongsTo('App\Models\Urs', 'urs_id');
    }
}
