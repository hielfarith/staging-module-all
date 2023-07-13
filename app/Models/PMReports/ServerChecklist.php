<?php

namespace App\Models\PMReports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServerChecklist extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pm_server_checklists';

    protected $fillable = [
        'server_ip_id',
        'checklist_id',
        'system_boot_reboot',
        'system_boot_error',
        'os_reboot',
        'os_error',
        'firewall_harden',
        'password_harden',
        'service_reboot',
        'service_error',
        'clean_log',
        'clean_cache',
        'app_us_reboot',
        'app_us_error',
        'app_up_reboot',
        'app_up_error',
        'app_backup',
        'hardware_status',
        'admin_tool_status',
        'resources_status',
        'count',
        'status',
    ];

    protected $primaryKey = 'id';

    public function ip_address()
    {
        return $this->belongsTo('App\Models\PMReports\ServerIP', 'server_ip_id');
    }

    public function checklist_pm()
    {
        return $this->belongsTo('App\Models\PMReports\ChecklistPM', 'checklist_id');
    }

    public function hardware()
    {
        return $this->hasOne('App\Models\PMReports\HardwareChecklist', 'server_checklist_id','id');
    }

    public function admin_tool()
    {
        return $this->hasOne('App\Models\PMReports\AdminToolChecklist', 'server_checklist_id','id');
    }

    public function resources()
    {
        return $this->hasOne('App\Models\PMReports\ResourcesChecklist', 'server_checklist_id','id');
    }

    public function appendix()
    {
        return $this->hasMany('App\Models\PMReports\ChecklistAppendix', 'server_checklist_id','id')->orderByRaw('ifnull(no, id)');
    }

    public function notes($type = null)
    {
        return $this->hasMany(ServerChecklistNote::class, 'server_checklist_id','id')
        ->when($type != null, function($query) use($type){
            $query->where('type',$type);
        });
    }

    // eager load everything thats connected
    public function getAll()
    {
        return $this->with(['ip_address','hardware','admin_tool','resources','appendix','appendix.uploadedFiles'])->first();
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($server_checklist){
            $server_checklist->appendix()->each(function($appendix){
                $appendix->delete();
            });
            $server_checklist->resources->delete();
            $server_checklist->admin_tool->delete();
            $server_checklist->hardware->delete();
            $server_checklist->notes()->each(function($notes){
                $notes->delete();
            });
        });
    }
}
