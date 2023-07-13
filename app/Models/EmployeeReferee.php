<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeReferee extends Model
{
    use HasFactory;

    public $table = 'employee_referee';
    protected $primaryKey = 'id';

    protected $fillable = [
    'employee_id',
    'refereeName',
    'refereeCtc',
    'refereeAddress',
    'refereeJob',
    'refereeWork',
    ];

    public function referee()
    {
        return $this->belongsTo('App\Models\Employee', 'id');
    }
}
