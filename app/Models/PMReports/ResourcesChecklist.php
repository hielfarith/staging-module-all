<?php

namespace App\Models\PMReports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourcesChecklist extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pm_resources_checklists';

    protected $fillable = [
        'server_checklist_id',
        'cpu_avail',
        'cpu_error',
        'mem_avail',
        'mem_error',
        'disk_st_reboot',
        'disk_st_error',
        'disk_us_reboot',
        'disk_us_error',
        'net_ping',
        'net_error',
        'status',
    ];

    protected $primaryKey = 'id';

    public function server_checklist()
    {
        return $this->belongsTo('App\Models\PMReports\ServerChecklist', 'server_checklist_id');
    }
}
