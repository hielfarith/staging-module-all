<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAccess extends Model
{
    use HasFactory;

    protected $table = 'role_access';

    protected $fillable = [
        'role_id', 
        'modul', 
        'proses',
        'capaian',
        'jenis' 
    ];

    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }
}
