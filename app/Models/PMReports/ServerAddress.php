<?php

namespace App\Models\PMReports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServerAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pm_server_address';

    protected $fillable = [
        'project_id',
        'address',
        'short_address',
        'type'
    ];

    protected $primaryKey = 'id';

    public function servers()
    {
        return $this->hasMany('App\Models\PMReports\ProjectServer', 'address_id','id');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project','project_id');
    }
}
