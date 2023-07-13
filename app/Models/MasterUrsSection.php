<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

/**
 * @property integer $id
 * @property integer $parent_id
 * @property integer $section_seq
 * @property string $section_name
 * @property integer $is_active
 * @property string $created_at
 * @property string $updated_at
 * @property MasterUrsSection $masterUrsSection
 */
class MasterUrsSection extends Model
{
    // use HasRecursiveRelationships;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'master_urs_section';

    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'section_seq', 'section_name', 'is_active', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function masterUrsSection()
    {
        return $this->belongsTo('App\Models\MasterUrsSection', 'parent_id');
    }

    public function sectionChildrens()
    {
        return $this->hasMany('App\Models\MasterUrsSection', 'parent_id')->orderBy('section_seq');
    }
}
