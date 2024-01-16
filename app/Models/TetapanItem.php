<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TetapanItem extends Model
{
    use HasFactory;
    protected $fillable = [
            'nama_aspek',
            'tarikh_kuatkuasa_aspek',
            'status_aspek',
            'belum_set',
            'telah_set',
            'wajaran_skala',
            'tindakan_oleh_siapa',
            'tetapan_skala',
            'julat_skala',
            'markah_skala_mandatori_catatan',
            'role_aspek',
            'type'
        ];
}
