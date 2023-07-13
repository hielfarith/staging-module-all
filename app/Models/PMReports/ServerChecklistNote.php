<?php

namespace App\Models\PMReports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServerChecklistNote extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pm_server_checklist_notes';

    protected $fillable = [
        'server_checklist_id',
        'type',
        'notes',
    ];

    protected $primaryKey = 'id';

    public function server_checklist()
    {
        return $this->belongsTo('App\Models\PMReports\ServerChecklist', 'server_checklist_id');
    }
}
