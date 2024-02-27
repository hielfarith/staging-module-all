<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Module;
use App\Models\Role;

class ModuleRole extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'module_role';

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
        'module_id',
        'role_id',
        'role_description',
        'active',
    ];

    /**
     * Get the main Module that owns the Module Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    /**
     * Get the main Role that owns the Module Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mainRole(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id');
    }
}
