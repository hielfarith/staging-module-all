<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property integer $id
 * @property integer $urs_id
 * @property string $ver_no
 * @property string $ver_date
 * @property string $ver_remark
 * @property string $ver_prepared_by
 * @property string $created_at
 * @property string $updated_at
 * @property Ur $ur
 */
class UrsVersion extends Model
{
    use LogsActivity;

    /**
     * @var array
     */
    protected $fillable = ['urs_id', 'ver_no', 'ver_date', 'ver_remark', 'ver_prepared_by', 'created_at', 'updated_at'];

    protected $dates = ['ver_date'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ur()
    {
        return $this->belongsTo('App\Models\Ur', 'urs_id');
    }
}
