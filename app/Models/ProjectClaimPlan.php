<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $project_id
 * @property string $claim_plan_desc
 * @property string $claim_plan_date
 * @property string $claim_plan_detail
 * @property float $claim_plan_monthly
 * @property float $claim_plan_other
 * @property float $claim_plan_total
 * @property string $created_at
 * @property string $updated_at
 * @property Project $project
 */
class ProjectClaimPlan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'project_claim_plan';

    public $dates = [
        'claim_plan_date'
    ];

    /**
     * @var array
     */
    protected $fillable = ['project_id', 'claim_plan_desc', 'claim_plan_date', 'claim_plan_detail', 'claim_plan_monthly', 'claim_plan_other', 'claim_plan_total', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
