<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasPosition extends Model
{
    use HasFactory;

    protected $connection = 'mysql_second';

    protected $table = 'user_has_position';

    protected $guarded = [];

    protected $casts = [
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $dates = ['effective_date'];

    public function user()
    {
        return $this->belongsTo('App\Models\TimesheetUserModel', 'user_id', 'id');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\TimesheetPosition', 'master_position_id', 'id');
    }
}
