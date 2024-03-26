<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStandardQualitySkipsSekolah extends Model
{
    use HasFactory;
    protected $fillable = [

        'penubuhan_pendaftaran',
        'pengurusan_institusi',
        'pengurusan_kurikulum',
        'pembelajaran',
        'pengurusan_penilaian',
        'pengurusan_pembangunan_guru',
        'pengurusan_kesihatan_murid',
        'displin',
        'piawaian',
        'pencapaian_academik',
        'pencapaian_kokurikulum',
        'kemenjadian_murid',
        'perwatakan_sekolah',
        'kokurikulum',
        'kebersihan',
        'butiran_institusi_id',
        'status'
    ];
}
