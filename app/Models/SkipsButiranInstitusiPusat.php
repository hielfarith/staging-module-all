<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkipsButiranInstitusiPusat extends Model
{
    use HasFactory;
    
    protected $table = 'skips_butiran_institusi_pusat';

    protected $fillable = [
            'nama_institusi',
            'nama_pengurus',
            'nama_pengerusi',
            'alamat',
            'alamat2',
            'alamat3',
            'negeri',
            'daerah',
            'poskod',
            'no_telephone',
            'fax',
            'email',
            'laman_web',
            'mempunyai_surat_kelulusan_kdn',
            'no_perakuan_pendaftaran',
            'no_pendaftaran_syarikat',
            'tarikh_tamat_perakuan_pendaftaran',
            'no_lesen_perniagaan',
            'mempunyai_audit_kewangan',
            'mempunyai_laporan_audit',
            'butiran_guru',
            'butiran_pelajar',
            'tarikh_audit',
            'tarikh_lapor',
            'no_surat_kelulusan_kdn',
            'tarikh_tamat_kelulusan_kdn'
    ];

}
