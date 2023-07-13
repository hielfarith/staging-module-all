<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTraining extends Model
{
    use HasFactory;

    public $table = 'employee_training';
    protected $primaryKey = 'id';

    protected $fillable = [
        'employee_id',
        'trainingType',
        'organizer',
        'startDate',
        'endDate',
    ];

    public function training()
    {
        return $this->belongsTo('App\Models\Employee', 'id');
    }
}
