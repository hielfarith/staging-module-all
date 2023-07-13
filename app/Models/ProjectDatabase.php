<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDatabase extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_databases';

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
        'name',
        'location',
        'role',
    ];

    public function project() {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }

}
