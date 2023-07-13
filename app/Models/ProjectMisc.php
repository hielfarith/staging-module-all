<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $project_id
 * @property integer $project_claim_plan_id
 * @property integer $master_trans_type_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $misc_month
 * @property string $misc_date
 * @property string $misc_invoice_receipt_no
 * @property float $misc_amount
 * @property string $created_at
 * @property string $updated_at
 * @property MasterTransType $masterTransType
 * @property Project $project
 * @property ProjectClaimPlan $projectClaimPlan
 * @property User $user
 * @property User $user
 */
class ProjectMisc extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'project_misc';

    protected $dates = [
        'misc_date'
    ];

    /**
     * @var array
     */
    protected $fillable = ['project_id', 'project_claim_plan_id', 'master_trans_type_id', 'created_by', 'updated_by', 'misc_month', 'misc_date', 'misc_invoice_receipt_no', 'misc_amount', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function masterTransType()
    {
        return $this->belongsTo('App\Models\MasterTransType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projectClaimPlan()
    {
        return $this->belongsTo('App\Models\ProjectClaimPlan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userCreate()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userUpdate()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }
}
