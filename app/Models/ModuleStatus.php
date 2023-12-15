<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Module;

class ModuleStatus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'module_status';

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
        'status_index',
        'status_name',
        'status_description',
        'status_color',
        'status_style',
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
