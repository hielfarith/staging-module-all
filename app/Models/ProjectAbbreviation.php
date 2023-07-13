<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAbbreviation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_abbreviations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $primaryKey = 'id';

    public $fillable = [
        'id',
        'project_id',
        'description',
        'abbreviation',
    ];

    public function project() {
        return $this->belongsTo('App\Models\Reports\Project', 'project_id', 'id');
    }
}
