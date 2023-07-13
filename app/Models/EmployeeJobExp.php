<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeJobExp extends Model
{
    use HasFactory;

    public $table = 'employee_job_experience';
    protected $primaryKey = 'id';

    protected $fillable = [
        'employee_id',
        'position',
        'startDate',
        'endDate',
        'compName',
        'compNumber',
        'businessType',
        'startSalary',
        'endSalary',
        'annLeaves',
        'remuneration',
        'reasonLeaving',
    ];

    public function exp()
    {
        return $this->belongsTo('App\Models\Employee', 'id');
    }


}
