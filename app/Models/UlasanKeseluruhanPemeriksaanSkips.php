<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UlasanKeseluruhanPemeriksaanSkips extends Model
{
    use HasFactory;
    protected $fillable = [
        'ulasan_ketua_pasukan_pemeriksa',
        'disediakan_oleh',
        'disediakan_oleh_tarikh',
        'disemak_oleh',
        'disemak_oleh_tarikh',
        'butiran_institusi_id'
    ];
}
