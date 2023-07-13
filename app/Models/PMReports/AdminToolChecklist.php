<?php

namespace App\Models\PMReports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminToolChecklist extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pm_admin_tool_checklists';

    protected $fillable = [
        'server_checklist_id',
        'availability',
        'account_cleanup',
        'status',
    ];

    protected $primaryKey = 'id';

    public function server_checklist()
    {
        return $this->belongsTo('App\Models\PMReports\ServerChecklist', 'server_checklist_id');
    }
}
