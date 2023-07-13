<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimesheetPosition extends Model
{
    use HasFactory;

    protected $connection = 'mysql_second';

    protected $table = 'master_position';

    protected $fillable = [
        'name',
        'code',
        'daily_rate',
        'effective_date'
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $dates = ['effective_date'];

    public function user()
    {
        return $this->belongsTo('App\Models\TimesheetUserModel', 'position_id', 'id');
    }
}
