<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLanguage extends Model
{
    use HasFactory;

    public $table = 'employee_language';
    protected $primaryKey = 'id';

    protected $fillable = [
        'employee_id',
        'language',
        'speak',
        'read',
        'write',
    ];

    public function language()
    {
        return $this->belongsTo('App\Models\Employee', 'id');
    }
}
