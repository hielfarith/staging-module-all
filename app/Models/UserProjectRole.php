<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property integer $id
 * @property integer $users_id
 * @property integer $projects_id
 * @property integer $master_project_role_id
 * @property string $created_at
 * @property string $updated_at
 * @property MasterProjectRole $masterProjectRole
 * @property User $user
 * @property Project $project
 */
class UserProjectRole extends Model
{
    use LogsActivity;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'user_project_role';

    /**
     * @var array
     */
    protected $fillable = ['users_id', 'projects_id', 'master_project_role_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function masterProjectRole()
    {
        return $this->belongsTo('App\Models\MasterProjectRole');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'projects_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }
}
