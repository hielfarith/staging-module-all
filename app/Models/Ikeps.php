<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikeps extends Model
{
    use HasFactory;

    protected $table = 'ikeps';

    protected $fillable = [
        'kod_sekolah',
        'tahun',
        'created_by',
        'updated_by',
    ];
}
