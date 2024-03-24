<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkipsButiranInstitusiSekolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'kod_sekolah',
        'nama_institusi',
        'alamat',
        'alamat2',
        'alamat3',
        'negeri',
        'daerah',
        'poskod',
        'bandar',
        'no_telephone',
        'email',
        'jenis_perakuan_pendaftaran',
        'tarikh_tamat',
        'nama_syarikat',
        'no_pendaftaran_syarikat',
        'tarikh_audit_laporan_kewangan',
        'tarikh_pengesahan_laporan_kewangan',
        'guru',
        'pelajar'
    ];
}
