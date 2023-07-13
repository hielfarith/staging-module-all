<?php

namespace App\Models\PMReports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServerIP extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pm_server_ips';

    protected $fillable = [
        'project_server_id',
        'ip_address',
    ];

    public function server()
    {
        return $this->belongsTo('App\Models\PMReports\ProjectServer','project_server_id');
    }

    public function server_checklist()
    {
        return $this->hasMany('App\Models\PMReports\ServerChecklist','server_ip_id','id');
    }

    public function getAll($id = null, $ip_id = null)
    {
        return $this->with([
            'server_checklist' => function($checklist) use($id,$ip_id){
                $checklist->where('checklist_id',$id)
                ->where('server_ip_id',$ip_id)->first();
            },
            'server_checklist.hardware',
            'server_checklist.admin_tool',
            'server_checklist.resources',
            'server_checklist.appendix',
            'server_checklist.appendix.uploadedFiles'
        ])
        ->latest()->first();
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($ip_address) {
            foreach ($ip_address->server_checklist()->get() as $server_checklist) {
                $server_checklist->delete();
            }
        });
    }
}
