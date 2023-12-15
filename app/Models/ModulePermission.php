<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Module;

class ModulePermission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'module_permission';

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
        'perm_name',
        'perm_description',
        'active',
    ];

    /**
     * Get the main Module that owns the submodule
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
