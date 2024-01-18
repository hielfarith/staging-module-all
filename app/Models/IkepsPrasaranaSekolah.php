<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IkepsPrasaranaSekolah extends Model
{
    use HasFactory;

    protected $table = 'ikeps_prasarana_sekolah';

    protected $fillable = [
        'tahun',
        'kod_sekolah',
        
        // Pemeriksaan Keselamatan
        'pemeriksaan_keselamatan',
        'tarikh_pemeriksaan',
    
        // Padang Sekolah
        'padang_sekolah',
        'status_hakmilik_padang_1',
        'status_hakmilik_padang_2',
        'ps_gunasama',
        'ps_bilangan',
    
        // Keluasan Trek 400M
        'kt_400',
        'kt_400_gunasama',
        'kt_400_bilangan',
        'kt_400_masih_digunakan',
        'kt_400_status_fizikal',
    
        // Keluasan Trek 300M
        'kt_300',
        'kt_300_gunasama',
        'kt_300_bilangan',
        'kt_300_masih_digunakan',
        'kt_300_status_fizikal',
    
        // Keluasan Trek 200M
        'kt_200',
        'kt_200_gunasama',
        'kt_200_bilangan',
        'kt_200_masih_digunakan',
        'kt_200_status_fizikal',
    
        // Keluasan Trek Kurang 200M
        'ktk_200',
        'ktk_200_gunasama',
        'ktk_200_bilangan',
        'ktk_200_masih_digunakan',
        'ktk_200_status_fizikal',
    
        // Gred Padang
        'gred_padang',
    
        // Trek Sintetik
        'trek_sintetik',
        'ts_bilangan',
    
        // Trek 400M
        'trek_400',
        'trek_400_gunasama',
        'trek_400_bilangan',
        'trek_400_masih_digunakan',
        'trek_400_status_fizikal',
    
        // Trek 200M
        'trek_200',
        'trek_200_gunasama',
        'trek_200_bilangan',
        'trek_200_masih_digunakan',
        'trek_200_status_fizikal',
    
        // Trek Lain-Lain
        'trek_lain',
        'trek_lain_details',
        'trek_lain_gunasama',
        'trek_lain_bilangan',
        'trek_lain_masih_digunakan',
        'trek_lain_status_fizikal',
    
        'created_by',
        'updated_by',
    ];
    
}
