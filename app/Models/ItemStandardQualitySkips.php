<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStandardQualitySkips extends Model
{
    use HasFactory;
    protected $fillable = [
        'penubuhan_pendaftaran',
        'pengurusan_institusi',
        'pengurusan_kurikulum',
        'pengajaran',
        'pengurusan_penilaian',
        'pengurusan_pembangunan_guru',
        'displin',
        'piawaian',
        'kebersihan',
        'kebersihan',
        'pengurusan_pelajar_antarabangsa',
        'penubuhan_pendaftaran_verfikasi',
        'pengurusan_institusi_verfikasi',
        'pengurusan_kurikulum_verfikasi',
        'pengajaran_verfikasi',
        'pengurusan_penilaian_verfikasi',
        'pengurusan_pembangunan_guru_verfikasi',
        'displin_verfikasi',
        'piawaian_verfikasi',
        'kebersihan_verfikasi',
        'kebersihan_verfikasi',
        'pengurusan_pelajar_antarabangsa_verfikasi',
        'butiran_institusi_id',
        'status'
    ];
}
