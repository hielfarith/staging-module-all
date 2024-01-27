<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButiranPemeriksaanSkips extends Model
{
    use HasFactory;

    protected $fillable = [

        'tarikh_pemeriksaan',
        'no_pasukan_pemeriksa',
        'pemeriksa_1',
        'pemeriksa_2',
        'pemeriksa_3',
        'kod_sekolah',
        'ketua_pemeriksa',
        'status'

    ];
}
