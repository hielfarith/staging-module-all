<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 * @property ProjectReportType[] $projectReportTypes
 */
class MasterReportType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'master_report_type';

    /**
     * @var array
     */
    protected $fillable = ['type', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectReportTypes()
    {
        return $this->hasMany('App\Models\ProjectReportType');
    }
}
