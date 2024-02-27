<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IkepsKemudahanSukan extends Model
{
    use HasFactory;

    protected $table = 'ikeps_kemudahan_sukan';

    protected $fillable = [
        'tahun',
        'kod_sekolah',

        // Bola Sepak
        'bola_sepak',
        'bola_sepak_bilangan',

        'bs_saiz_standard',
        'bs_saiz_standard_gunasama',
        'bs_saiz_standard_bilangan',
        'bs_saiz_standard_masih_digunakan',
        'bs_saiz_standard_status_fizikal',

        'bs_saiz_latihan',
        'bs_saiz_latihan_gunasama',
        'bs_saiz_latihan_bilangan',
        'bs_saiz_latihan_masih_digunakan',
        'bs_saiz_latihan_status_fizikal',

        // Hoki
        'hoki',
        'hoki_bilangan',

        'hoki_saiz_standard',
        'hoki_saiz_standard_gunasama',
        'hoki_saiz_standard_bilangan',
        'hoki_saiz_standard_masih_digunakan',
        'hoki_saiz_standard_status_fizikal',

        'hoki_saiz_latihan',
        'hoki_saiz_latihan_gunasama',
        'hoki_saiz_latihan_bilangan',
        'hoki_saiz_latihan_masih_digunakan',
        'hoki_saiz_latihan_status_fizikal',

        'hoki_rumput_standard',
        'hoki_rumput_standard_gunasama',
        'hoki_rumput_standard_bilangan',
        'hoki_rumput_standard_masih_digunakan',
        'hoki_rumput_standard_status_fizikal',

        'hoki_rumput_latihan',
        'hoki_rumput_latihan_gunasama',
        'hoki_rumput_latihan_bilangan',
        'hoki_rumput_latihan_masih_digunakan',
        'hoki_rumput_latihan_status_fizikal',

        // Bola Jaring
        'bola_jaring',
        'bola_jaring_bilangan',
        
        'bj_dewan',
        'bj_dewan_gunasama',
        'bj_dewan_bilangan',
        'bj_dewan_masih_digunakan',
        'bj_dewan_status_fizikal',

        'bj_berbumbung',
        'bj_berbumbung_gunasama',
        'bj_berbumbung_bilangan',
        'bj_berbumbung_masih_digunakan',
        'bj_berbumbung_status_fizikal',

        'bj_hardcourt',
        'bj_hardcourt_gunasama',
        'bj_hardcourt_bilangan',
        'bj_hardcourt_masih_digunakan',
        'bj_hardcourt_status_fizikal',

        'bj_berumput',
        'bj_berumput_gunasama',
        'bj_berumput_bilangan',
        'bj_berumput_masih_digunakan',
        'bj_berumput_status_fizikal',

        // Sepak Takraw
        'sepak_takraw',
        'sepak_takraw_bilangan',

        'st_dewan',
        'st_dewan_gunasama',
        'st_dewan_bilangan',
        'st_dewan_masih_digunakan',
        'st_dewan_status_fizikal',

        'st_berbumbung',
        'st_berbumbung_gunasama',
        'st_berbumbung_bilangan',
        'st_berbumbung_masih_digunakan',
        'st_berbumbung_status_fizikal',

        'st_terbuka',
        'st_terbuka_gunasama',
        'st_terbuka_bilangan',
        'st_terbuka_masih_digunakan',
        'st_terbuka_status_fizikal',

        // Bola Tampar
        'bola_tampar',
        'bola_tampar_bilangan',

        'bt_dewan',
        'bt_dewan_gunasama',
        'bt_dewan_bilangan',
        'bt_dewan_masih_digunakan',
        'bt_dewan_status_fizikal',

        'bt_berbumbung',
        'bt_berbumbung_gunasama',
        'bt_berbumbung_bilangan',
        'bt_berbumbung_masih_digunakan',
        'bt_berbumbung_status_fizikal',

        'bt_terbuka',
        'bt_terbuka_gunasama',
        'bt_terbuka_bilangan',
        'bt_terbuka_masih_digunakan',
        'bt_terbuka_status_fizikal',

        // Badminton
        'badminton',
        'badminton_bilangan',

        'badminton_dewan',
        'badminton_dewan_gunasama',
        'badminton_dewan_bilangan',
        'badminton_dewan_masih_digunakan',
        'badminton_dewan_status_fizikal',

        'badminton_berbumbung',
        'badminton_berbumbung_gunasama',
        'badminton_berbumbung_bilangan',
        'badminton_berbumbung_masih_digunakan',
        'badminton_berbumbung_status_fizikal',

        'badminton_terbuka',
        'badminton_terbuka_gunasama',
        'badminton_terbuka_bilangan',
        'badminton_terbuka_masih_digunakan',
        'badminton_terbuka_status_fizikal',

        // Kriket
        'kriket',
        'kriket_bilangan',

        'kriket_standard',
        'kriket_standard_gunasama',
        'kriket_standard_bilangan',
        'kriket_standard_masih_digunakan',
        'kriket_standard_status_fizikal',

        'kriket_latihan',
        'kriket_latihan_gunasama',
        'kriket_latihan_bilangan',
        'kriket_latihan_masih_digunakan',
        'kriket_latihan_status_fizikal',

        // Tenis
        'tenis',
        'tenis_bilangan',

        'tenis_terbuka',
        'tenis_terbuka_gunasama',
        'tenis_terbuka_bilangan',
        'tenis_terbuka_masih_digunakan',
        'tenis_terbuka_status_fizikal',

        // Ping Pong
        'ping_pong',
        'ping_pong_bilangan',

        'pp_tertutup',
        'pp_tertutup_gunasama',
        'pp_tertutup_bilangan',
        'pp_tertutup_masih_digunakan',
        'pp_tertutup_status_fizikal',

        'pp_terbuka',
        'pp_terbuka_gunasama',
        'pp_terbuka_bilangan',
        'pp_terbuka_masih_digunakan',
        'pp_terbuka_status_fizikal',

        // Sofbol
        'sofbol',
        'sofbol_bilangan',

        'sofbol_standard',
        'sofbol_standard_gunasama',
        'sofbol_standard_bilangan',
        'sofbol_standard_masih_digunakan',
        'sofbol_standard_status_fizikal',

        'sofbol_latihan',
        'sofbol_latihan_gunasama',
        'sofbol_latihan_bilangan',
        'sofbol_latihan_masih_digunakan',
        'sofbol_latihan_status_fizikal',

        // Memanah
        'memanah',
        'memanah_bilangan',

        'memanah_standard',
        'memanah_standard_gunasama',
        'memanah_standard_bilangan',
        'memanah_standard_masih_digunakan',
        'memanah_standard_status_fizikal',

        'memanah_latihan',
        'memanah_latihan_gunasama',
        'memanah_latihan_bilangan',
        'memanah_latihan_masih_digunakan',
        'memanah_latihan_status_fizikal',

        // Skuasy
        'skuasy',
        'skuasy_bilangan',

        'skuasy_dewan',
        'skuasy_dewan_gunasama',
        'skuasy_dewan_bilangan',
        'skuasy_dewan_masih_digunakan',
        'skuasy_dewan_status_fizikal',

        // Gimnastik Artistik
        'gimnastik_artistik',
        'gimnastik_artistik_bilangan',

        'ga_standard',
        'ga_standard_gunasama',
        'ga_standard_bilangan',
        'ga_standard_masih_digunakan',
        'ga_standard_status_fizikal',

        'ga_latihan',
        'ga_latihan_gunasama',
        'ga_latihan_bilangan',
        'ga_latihan_masih_digunakan',
        'ga_latihan_status_fizikal',

        // Gimnastik Berirama
        'gimnastik_berirama',
        'gimnastik_berirama_bilangan',

        'gb_standard',
        'gb_standard_gunasama',
        'gb_standard_bilangan',
        'gb_standard_masih_digunakan',
        'gb_standard_status_fizikal',

        'gb_latihan',
        'gb_latihan_gunasama',
        'gb_latihan_bilangan',
        'gb_latihan_masih_digunakan',
        'gb_latihan_status_fizikal',

        // Bola Baling
        'bola_baling',
        'bola_baling_bilangan',

        'bb_dewan',
        'bb_dewan_gunasama',
        'bb_dewan_bilangan',
        'bb_dewan_masih_digunakan',
        'bb_dewan_status_fizikal',

        'bb_berbumbung',
        'bb_berbumbung_gunasama',
        'bb_berbumbung_bilangan',
        'bb_berbumbung_masih_digunakan',
        'bb_berbumbung_status_fizikal',

        'bb_hardcourt',
        'bb_hardcourt_gunasama',
        'bb_hardcourt_bilangan',
        'bb_hardcourt_masih_digunakan',
        'bb_hardcourt_status_fizikal',

        'bb_berumput',
        'bb_berumput_gunasama',
        'bb_berumput_bilangan',
        'bb_berumput_masih_digunakan',
        'bb_berumput_status_fizikal',

        // Bola Keranjang
        'bola_keranjang',
        'bola_keranjang_bilangan',

        'bk_dewan',
        'bk_dewan_gunasama',
        'bk_dewan_bilangan',
        'bk_dewan_masih_digunakan',
        'bk_dewan_status_fizikal',

        'bk_berbumbung',
        'bk_berbumbung_gunasama',
        'bk_berbumbung_bilangan',
        'bk_berbumbung_masih_digunakan',
        'bk_berbumbung_status_fizikal',

        'bk_terbuka',
        'bk_terbuka_gunasama',
        'bk_terbuka_bilangan',
        'bk_terbuka_masih_digunakan',
        'bk_terbuka_status_fizikal',

        // Ragbi
        'ragbi',
        'ragbi_bilangan',

        'ragbi_standard',
        'ragbi_standard_gunasama',
        'ragbi_standard_bilangan',
        'ragbi_standard_masih_digunakan',
        'ragbi_standard_status_fizikal',

        'ragbi_latihan',
        'ragbi_latihan_gunasama',
        'ragbi_latihan_bilangan',
        'ragbi_latihan_masih_digunakan',
        'ragbi_latihan_status_fizikal',

        // Futsal
        'futsal',
        'futsal_bilangan',

        'futsal_dewan',
        'futsal_dewan_gunasama',
        'futsal_dewan_bilangan',
        'futsal_dewan_masih_digunakan',
        'futsal_dewan_status_fizikal',

        'futsal_berbumbung',
        'futsal_berbumbung_gunasama',
        'futsal_berbumbung_bilangan',
        'futsal_berbumbung_masih_digunakan',
        'futsal_berbumbung_status_fizikal',

        'futsal_terbuka',
        'futsal_terbuka_gunasama',
        'futsal_terbuka_bilangan',
        'futsal_terbuka_masih_digunakan',
        'futsal_terbuka_status_fizikal',

        // Boling Tenpin
        'boling_tenpin',
        'boling_tenpin_bilangan',

        'bt_8',
        'bt_8_gunasama',
        'bt_8_bilangan',
        'bt_8_masih_digunakan',
        'bt_8_status_fizikal',

        'bt_12',
        'bt_12_gunasama',
        'bt_12_bilangan',
        'bt_12_masih_digunakan',
        'bt_12_status_fizikal',

        'bt_lain',
        'bt_lain_butiran',
        'bt_lain_gunasama',
        'bt_lain_bilangan',
        'bt_lain_masih_digunakan',
        'bt_lain_status_fizikal',

        // Lain-lain
        'lain',
        'lain_bilangan',

        'lain_kemudahan',
        'lain_kemudahan_butiran',
        'lain_kemudahan_gunasama',
        'lain_kemudahan_bilangan',
        'lain_kemudahan_masih_digunakan',
        'lain_kemudahan_status_fizikal',

        'created_by',
        'updated_by',
    ];

}
