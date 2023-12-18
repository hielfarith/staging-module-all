<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Module;
use App\Models\ModuleRole;
use App\Models\ModuleStatus;
use App\Models\MasterAction;

class ModuleFlowManagement extends Model
{
    protected $table = 'module_flow_management';

    // Disable Laravel's mass assignment protection
    protected $guarded = [];

    protected $primaryKey = 'id';

    public $fillable = [
        'id',
        'module_id',
        'current_status',
        'module_role_id',
        'action',
        'next_status',
        'active',
    ];

    /**
     * Get the module that owns the FlowManagement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function currentStatus(): BelongsTo
    {
        return $this->belongsTo(ModuleStatus::class, 'current_status');
    }

    public function nextStatus(): BelongsTo
    {
        return $this->belongsTo(ModuleStatus::class, 'next_status');
    }

    public function moduleRole(): BelongsTo
    {
        return $this->belongsTo(ModuleRole::class, 'module_role_id');
    }
    public function actions(): BelongsTo
    {
        return $this->belongsTo(MasterAction::class, 'action', 'key');
    }
}
