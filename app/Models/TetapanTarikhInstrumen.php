<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TetapanTarikhInstrumen extends Model
{
    use HasFactory;
    protected $fillable = [
        'tarikh_mula',
        'tarikh_mula_hari',
        'tarikh_mula_bulan',
        'tarikh_mula_tahun',
        'tarikh_akhir',
        'tarikh_akhir_hari',
        'tarikh_akhir_bulan',
        'tarikh_akhir_tahun',
        'type'
    ];
}
