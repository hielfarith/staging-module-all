<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ModuleStatus;

class IkepsPrasaranaSukan extends Model
{
    use HasFactory;

    protected $table = 'ikeps_prasarana_sukan';

    protected $fillable = [
        'tahun',
        'kod_sekolah',

        // Pemeriksaan Keselamatan
        'pemeriksaan_keselamatan',
        'tarikh_pemeriksaan',

        // Padang Sekolah
        'padang_sekolah',
        'padang_sekolah_gunasama',
        'padang_sekolah_bilangan',

        'status_padang',
        'status_padang_butiran',

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
        'trek_sintetik_bilangan',

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
        'trek_lain_butiran',
        'trek_lain_gunasama',
        'trek_lain_bilangan',
        'trek_lain_masih_digunakan',
        'trek_lain_status_fizikal',

        // Astaka
        'astaka',
        'astaka_bilangan',

        // Kapasiti Melebihi 500
        'km_500',
        'km_500_gunasama',
        'km_500_bilangan',
        'km_500_masih_digunakan',
        'km_500_status_fizikal',

        // Kapasiti Kurang 500
        'kk_500',
        'kk_500_gunasama',
        'kk_500_bilangan',
        'kk_500_masih_digunakan',
        'kk_500_status_fizikal',

        // Dewan
        'dewan',
        'dewan_bilangan',

        // Dewan Besar
        'dewan_besar',
        'dewan_besar_gunasama',
        'dewan_besar_bilangan',
        'dewan_besar_masih_digunakan',
        'dewan_besar_status_fizikal',

        // Dewan Khas Untuk Sukan
        'dewan_khas',
        'dewan_khas_gunasama',
        'dewan_khas_bilangan',
        'dewan_khas_masih_digunakan',
        'dewan_khas_status_fizikal',

        // Bilik Peralatan Sukan
        'bilik_sukan',
        'bilik_sukan_bilangan',

        // Stor 1 Bay
        'stor_1',
        'stor_1_gunasama',
        'stor_1_bilangan',
        'stor_1_masih_digunakan',
        'stor_1_status_fizikal',

        // Stor 2 Bay
        'stor_2',
        'stor_2_gunasama',
        'stor_2_bilangan',
        'stor_2_masih_digunakan',
        'stor_2_status_fizikal',

        // Stor 3 Bay
        'stor_3',
        'stor_3_gunasama',
        'stor_3_bilangan',
        'stor_3_masih_digunakan',
        'stor_3_status_fizikal',

        // Bilik Persalinan
        'bilik_persalinan',
        'bilik_persalinan_bilangan',

        // Murid Lelaki
        'murid_lelaki',
        'murid_lelaki_gunasama',
        'murid_lelaki_bilangan',
        'murid_lelaki_masih_digunakan',
        'murid_lelaki_status_fizikal',

        // Murid Perempuan
        'murid_perempuan',
        'murid_perempuan_gunasama',
        'murid_perempuan_bilangan',
        'murid_perempuan_masih_digunakan',
        'murid_perempuan_status_fizikal',

        // Gelanggang Serbaguna
        'gelanggang_serbaguna',
        'gelanggang_serbaguna_bilangan',

        // Terbuka Berbumbung
        'terbuka_berbumbung',
        'terbuka_berbumbung_gunasama',
        'terbuka_berbumbung_bilangan',
        'terbuka_berbumbung_masih_digunakan',
        'terbuka_berbumbung_status_fizikal',

        // Terbuka
        'terbuka',
        'terbuka_gunasama',
        'terbuka_bilangan',
        'terbuka_masih_digunakan',
        'terbuka_status_fizikal',

        // Bilik Kecergasan
        'bilik_kecergasan',
        'bilik_kecergasan_gunasama',
        'bilik_kecergasan_bilangan',
        'bilik_kecergasan_masih_digunakan',
        'bilik_kecergasan_status_fizikal',

        // Makmal Sains Sukan
        'makmal_sains',
        'makmal_sains_gunasama',
        'makmal_sains_bilangan',
        'makmal_sains_masih_digunakan',
        'makmal_sains_status_fizikal',

        // Kolam Renang
        'kolam_renang',
        'kolam_renang_gunasama',
        'kolam_renang_bilangan',
        'kolam_renang_masih_digunakan',
        'kolam_renang_status_fizikal',

        'created_by',
        'updated_by',

        //status for flow
        'status'
    ];

    public function statuses(): BelongsTo
    {
        return $this->belongsTo(ModuleStatus::class, 'status', 'id');
    }

}
