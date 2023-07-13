<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $project_id
 * @property string $item_name
 * @property float $tender_price
 * @property float $contigency
 * @property float $tax
 * @property float $base_price
 * @property float $best_case
 * @property float $on_par
 * @property float $worst_case
 * @property string $created_at
 * @property string $updated_at
 * @property Project $project
 */
class ProjectBudget extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'project_budget';

    /**
     * @var array
     */
    protected $fillable = ['project_id', 'item_name', 'tender_price', 'contigency', 'tax', 'base_price', 'best_case', 'on_par', 'worst_case', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
