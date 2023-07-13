<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $table = 'employee';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'users_id',
        'name',
        'nric',
        'address',
        'email',
        'age',
        'dob',
        'ctcNumber',
        'nationality',
        'race',
        'religion',
        'maritalStatus',
        'emgName',
        'emgNumber',
        'emgRelation',
        'emgAddress',
        'bankName',
        'accNumber',
    ];

    public function employeeEdu()
    {
      return $this->hasMany('App\Models\EmployeeEdu', 'id');
    }

    public function employeeJobExp()
    {
   return $this->hasMany('App\Models\EmployeeJobExp', 'id');
    }

    public function employeeLanguage()
    {
   return $this->hasMany('App\Models\EmployeeLanguage', 'id');
    }

    public function employeeSkill()
    {
   return $this->hasMany('App\Models\EmployeeSkill', 'id');
    }

    public function employeeTraining()
    {
   return $this->hasMany('App\Models\EmployeeTraining', 'id');
    }

    public function employeeReferee()
    {
   return $this->hasMany('App\Models\EmployeeReferee', 'id');
    }

}
