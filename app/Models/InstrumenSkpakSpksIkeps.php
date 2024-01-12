<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrumenSkpakSpksIkeps extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
            'nama_instrumen',
            'tujuan_instrumen',
            'pengguna_instrumen',
            'pengisian_oleh',
            'pengesahan_ole',
            'verifikasi_oleh',
            'validasi_oleh',
            'perakuan_oleh',
            'tempoh_bagi_setiap_proses',
            'instrumen_perlu_diisi',
            'tarikh_kuatkuasa',
            'tetapan_keperluan_pengemaskinian_data_terkini',
            'status'
        ];
}
