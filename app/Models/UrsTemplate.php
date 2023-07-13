<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property integer $id
 * @property string $template_ori_name
 * @property string $template_remark
 * @property string $template_path
 * @property integer $is_active
 * @property string $created_at
 * @property string $updated_at
 */
class UrsTemplate extends Model
{
    use LogsActivity;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['template_ori_name', 'template_remark', 'template_path', 'is_active', 'created_at', 'updated_at'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }
    
    public function templateExist()
    {
        $exist = false;

        if ($this->template_path) {
            if (Storage::disk('public')->exists($this->template_path)) {
                $exist = true;
            }
        }

        return $exist;
    }
}
