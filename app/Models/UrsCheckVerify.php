<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property integer $id
 * @property integer $urs_id
 * @property integer $type
 * @property string $name
 * @property string $position
 * @property string $signature
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 * @property Ur $ur
 */
class UrsCheckVerify extends Model
{
    use LogsActivity;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'urs_check_verify';

    protected $dates = ['date'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    /**
     * @var array
     */
    protected $fillable = ['urs_id', 'type', 'name', 'position', 'signature', 'date', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ur()
    {
        return $this->belongsTo('App\Models\Ur', 'urs_id');
    }
}
