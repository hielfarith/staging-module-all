<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSkill extends Model
{
    use HasFactory;

    public $table = 'employee_skills';
    protected $primaryKey = 'id';

    protected $fillable = [
        'employee_id',
        'skillsType',
    ];

    public function skill()
    {
        return $this->belongsTo('App\Models\Employee', 'id');
    }
}
