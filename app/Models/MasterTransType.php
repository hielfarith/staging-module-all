<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $desc
 * @property string $code
 * @property integer $is_active
 * @property string $created_at
 * @property string $updated_at
 * @property ProjectMisc[] $projectMiscs
 */
class MasterTransType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'master_trans_type';

    /**
     * @var array
     */
    protected $fillable = ['desc', 'code', 'is_active', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectMiscs()
    {
        return $this->hasMany('App\Models\ProjectMisc');
    }
}
