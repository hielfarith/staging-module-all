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
        'butiran_institusi_id',
        'status'
    ];
}
