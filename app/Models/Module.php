<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ModuleRole;
use App\Models\ModuleStatus;
use App\Models\ModulePermission;
use App\Models\ModuleFlowManagement;
use App\Models\ModuleTask;

class Module extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'module';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // Disable Laravel's mass assignment protection
    protected $guarded = [];

    protected $primaryKey = 'id';

    public $fillable = [
        'id',
        'module_name',
        'module_short_name',
        'module_description',
        'active',
    ];

    /**
     * Get all of the role for the module
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles(): HasMany
    {
        return $this->hasMany(ModuleRole::class, 'module_id');
    }

    /**
     * Get all of the statuses for the module
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses(): HasMany
    {
        return $this->hasMany(ModuleStatus::class, 'module_id')->orderBy('status_index');
    }

    /**
     * Get all of the permissions for the module
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions(): HasMany
    {
        return $this->hasMany(ModulePermission::class, 'module_id')->orderBy('id');
    }

    /**
     * Get all of the flow related for the module
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flowManagements(): HasMany
    {
        return $this->hasMany(ModuleFlowManagement::class, 'module_id');
    }

    /**
     * Get all of the tasks permission related for the module
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(ModuleTask::class, 'module_id');
    }

    /**
     * Get all of the tasks permission related for the module by group of role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasksByRole(): HasMany
    {
        return $this->hasMany(ModuleTask::class, 'module_id')->selectRaw('module_role_id, COUNT(id) as totalByRole')->groupBy('module_role_id');
    }
}
