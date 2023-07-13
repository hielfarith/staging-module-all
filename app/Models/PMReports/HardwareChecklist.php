<?php

namespace App\Models\PMReports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HardwareChecklist extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pm_hardware_checklists';

    protected $fillable = [
        'server_checklist_id',
        'fan_reboot',
        'fan_error',
        'psu_reboot',
        'psu_error',
        'cable_reboot',
        'cable_error',
        'status',
    ];

    protected $primaryKey = 'id';

    public function server_checklist()
    {
        return $this->belongsTo('App\Models\PMReports\ServerChecklist', 'server_checklist_id');
    }


}
