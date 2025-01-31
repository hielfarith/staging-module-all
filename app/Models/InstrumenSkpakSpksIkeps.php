<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrumenSkpakSpksIkeps extends Model
{
    use HasFactory;

    public $table = 'instrumen_skpak_spks_ikep';
    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'nama_instrumen',
        'tujuan_instrumen',
        //'pengguna_instrumen',
        'pengisian_oleh',
        'pengesahan_ole',
        'verifikasi_oleh',
        'validasi_oleh',
        'perakuan_oleh',
        'tempoh_bagi_setiap_proses',
        'instrumen_perlu_diisi',
        'tarikh_kuatkuasa',
        'tetapan_keperluan_pengemaskinian_data_terkini',
        'status',
        // 'tempoh_pengisian',
        // 'tempoh_pengisian_lain',
        // 'tempoh_pengeshan',
        // 'tempoh_pengeshan_lain',
        // 'tempoh_verifikasi',
        // 'tempoh_verifikasi_lain',
        // 'tempoh_validasi',
        // 'tempoh_validasi_lain',
        // 'tempoh_perakuan',
        // 'tempoh_perakuan_lain',
        'pengisian_dari',
        'pengisian_hingga',
        'institusi_pengisian',
        'pengesahan_dari',
        'pengesahan_hingga',
        'institusi_pengesahan',
        'verifikasi_dari',
        'verifikasi_hingga',
        'institusi_verifikasi',
        'validasi_dari',
        'validasi_hingga',
        'institusi_validasi',
        'perakuan_dari',
        'perakuan_hingga',
        'institusi_perakuan',
        'type',
        'kategori',
        'jenis_ips'
    ];

    public function butiranInstitusiSkips()
    {
        return $this->hasMany('App\Models\ButiranInstitusiSkips', 'instrumen_skips_id', 'id');
    }
}
