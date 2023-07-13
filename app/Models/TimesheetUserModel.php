<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReportTimesheet;

class TimesheetUserModel extends Model
{
    use HasFactory;

    protected $connection = 'mysql_second';

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'password_updated',
        'position_id',
        'status_id',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'api_token',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function timesheet()
    {
        return $this->hasMany('App\Models\ReportTimesheet', 'user_id', 'id');
    }
}
