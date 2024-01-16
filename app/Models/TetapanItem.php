<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TetapanItem extends Model
{
    use HasFactory;
    protected $fillable = [
            'nama_item',
            'tarikh_kuatkuasa_item',
            'status_item',
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
