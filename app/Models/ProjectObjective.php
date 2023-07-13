<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectObjective extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_objectives';

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
        'project_report_type_id',
        'master_report_type_id',
        'objective',
    ];

    public function project() {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }

    public function masterReportType() {
        return $this->belongsTo('App\Models\MasterReportType', 'master_report_type_id', 'id');
    }
    
    public function projectReportType() {
        return $this->belongsTo('App\Models\ProjectReportType', 'project_report_type_id', 'id');
    }
}
