<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEdu extends Model
{
    use HasFactory;

    public $table = 'employee_education';
    protected $primaryKey = 'id';

    protected $fillable = [
        'employee_id',
        'level',
        'uniName',
        'courseName',
        'yearGrad',
    ];

    public function edu()
    {
        return $this->belongsTo('App\Models\Employee', 'id');
    }


}
