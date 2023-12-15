<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Module;
use App\Models\ModuleRole;
use App\Models\ModuleStatus;
use App\Models\ModulePermission;

class ModuleTask extends Model
{
    protected $table = 'module_task';

    // Disable Laravel's mass assignment protection
    protected $guarded = [];

    protected $primaryKey = 'id';

    public $fillable = [
        'id',
        'module_id',
        'module_role_id',
        'module_status_id',
        'module_permission_id',
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

    public function moduleRole(): BelongsTo
    {
        return $this->belongsTo(ModuleRole::class, 'module_role_id');
    }

    public function moduleStatus(): BelongsTo
    {
        return $this->belongsTo(ModuleStatus::class, 'module_status_id');
    }

    public function modulePermission(): BelongsTo
    {
        return $this->belongsTo(ModulePermission::class, 'module_permission_id');
    }
}
