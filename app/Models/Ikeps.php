<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikeps extends Model
{
    use HasFactory;

    protected $table = 'ikeps';

    protected $fillable = [
        'kod_sekolah',
        'tahun',
        'status',
        'disediakan_oleh', 
        'tarikh_disediakan', 
        'disahkan_oleh', 
        'tarikh_disahkan',
        'created_by',
        'updated_by',
    ];

    public function setCreatedByAttribute($value)
    {
        $this->attributes['created_by'] = $value;
    }

    public function setUpdatedByAttribute($value)
    {
        $this->attributes['updated_by'] = $value;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->created_by) {
                $model->created_by = auth()->id(); 
            }
            $model->updated_by = auth()->id(); 
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->id(); 
        });
    }

    public function statuses()
    {
        return $this->belongsTo(ModuleStatus::class, 'status', 'id');
    }
}
