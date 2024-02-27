<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikeps_kemudahan_sukan', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('kod_sekolah');

            //Bola Sepak
            $table->boolean('bola_sepak');
            $table->integer('bola_sepak_bilangan')->nullable();

            $table->boolean('bs_saiz_standard')->default(false);
            $table->boolean('bs_saiz_standard_gunasama')->nullable();
            $table->integer('bs_saiz_standard_bilangan')->nullable();
            $table->boolean('bs_saiz_standard_masih_digunakan')->nullable();
            $table->integer('bs_saiz_standard_status_fizikal')->nullable();

            $table->boolean('bs_saiz_latihan')->default(false);
            $table->boolean('bs_saiz_latihan_gunasama')->nullable();
            $table->integer('bs_saiz_latihan_bilangan')->nullable();
            $table->boolean('bs_saiz_latihan_masih_digunakan')->nullable();
            $table->integer('bs_saiz_latihan_status_fizikal')->nullable();

            //Padang Hoki
            $table->boolean('hoki');
            $table->integer('hoki_bilangan')->nullable();

            $table->boolean('hoki_saiz_standard')->default(false);
            $table->boolean('hoki_saiz_standard_gunasama')->nullable();
            $table->integer('hoki_saiz_standard_bilangan')->nullable();
            $table->boolean('hoki_saiz_standard_masih_digunakan')->nullable();
            $table->integer('hoki_saiz_standard_status_fizikal')->nullable();

            $table->boolean('hoki_saiz_latihan')->default(false);
            $table->boolean('hoki_saiz_latihan_gunasama')->nullable();
            $table->integer('hoki_saiz_latihan_bilangan')->nullable();
            $table->boolean('hoki_saiz_latihan_masih_digunakan')->nullable();
            $table->integer('hoki_saiz_latihan_status_fizikal')->nullable();

            $table->boolean('hoki_rumput_standard')->default(false);
            $table->boolean('hoki_rumput_standard_gunasama')->nullable();
            $table->integer('hoki_rumput_standard_bilangan')->nullable();
            $table->boolean('hoki_rumput_standard_masih_digunakan')->nullable();
            $table->integer('hoki_rumput_standard_status_fizikal')->nullable();

            $table->boolean('hoki_rumput_latihan')->default(false);
            $table->boolean('hoki_rumput_latihan_gunasama')->nullable();
            $table->integer('hoki_rumput_latihan_bilangan')->nullable();
            $table->boolean('hoki_rumput_latihan_masih_digunakan')->nullable();
            $table->integer('hoki_rumput_latihan_status_fizikal')->nullable();

            //Bola Jaring
            $table->boolean('bola_jaring');
            $table->integer('bola_jaring_bilangan')->nullable();

            $table->boolean('bj_dewan')->default(false);
            $table->boolean('bj_dewan_gunasama')->nullable();
            $table->integer('bj_dewan_bilangan')->nullable();
            $table->boolean('bj_dewan_masih_digunakan')->nullable();
            $table->integer('bj_dewan_status_fizikal')->nullable();

            $table->boolean('bj_berbumbung')->default(false);
            $table->boolean('bj_berbumbung_gunasama')->nullable();
            $table->integer('bj_berbumbung_bilangan')->nullable();
            $table->boolean('bj_berbumbung_masih_digunakan')->nullable();
            $table->integer('bj_berbumbung_status_fizikal')->nullable();

            $table->boolean('bj_hardcourt')->default(false);
            $table->boolean('bj_hardcourt_gunasama')->nullable();
            $table->integer('bj_hardcourt_bilangan')->nullable();
            $table->boolean('bj_hardcourt_masih_digunakan')->nullable();
            $table->integer('bj_hardcourt_status_fizikal')->nullable();

            $table->boolean('bj_berumput')->default(false);
            $table->boolean('bj_berumput_gunasama')->nullable();
            $table->integer('bj_berumput_bilangan')->nullable();
            $table->boolean('bj_berumput_masih_digunakan')->nullable();
            $table->integer('bj_berumput_status_fizikal')->nullable();

            //Sepak Takraw
            $table->boolean('sepak_takraw');
            $table->integer('sepak_takraw_bilangan')->nullable();

            $table->boolean('st_dewan')->default(false);
            $table->boolean('st_dewan_gunasama')->nullable();
            $table->integer('st_dewan_bilangan')->nullable();
            $table->boolean('st_dewan_masih_digunakan')->nullable();
            $table->integer('st_dewan_status_fizikal')->nullable();

            $table->boolean('st_berbumbung')->default(false);
            $table->boolean('st_berbumbung_gunasama')->nullable();
            $table->integer('st_berbumbung_bilangan')->nullable();
            $table->boolean('st_berbumbung_masih_digunakan')->nullable();
            $table->integer('st_berbumbung_status_fizikal')->nullable();

            $table->boolean('st_terbuka')->default(false);
            $table->boolean('st_terbuka_gunasama')->nullable();
            $table->integer('st_terbuka_bilangan')->nullable();
            $table->boolean('st_terbuka_masih_digunakan')->nullable();
            $table->integer('st_terbuka_status_fizikal')->nullable();

            //Bola Tampar
            $table->boolean('bola_tampar');
            $table->integer('bola_tampar_bilangan')->nullable();

            $table->boolean('bt_dewan')->default(false);
            $table->boolean('bt_dewan_gunasama')->nullable();
            $table->integer('bt_dewan_bilangan')->nullable();
            $table->boolean('bt_dewan_masih_digunakan')->nullable();
            $table->integer('bt_dewan_status_fizikal')->nullable();

            $table->boolean('bt_berbumbung')->default(false);
            $table->boolean('bt_berbumbung_gunasama')->nullable();
            $table->integer('bt_berbumbung_bilangan')->nullable();
            $table->boolean('bt_berbumbung_masih_digunakan')->nullable();
            $table->integer('bt_berbumbung_status_fizikal')->nullable();

            $table->boolean('bt_terbuka')->default(false);
            $table->boolean('bt_terbuka_gunasama')->nullable();
            $table->integer('bt_terbuka_bilangan')->nullable();
            $table->boolean('bt_terbuka_masih_digunakan')->nullable();
            $table->integer('bt_terbuka_status_fizikal')->nullable();

            //Badminton
            $table->boolean('badminton');
            $table->integer('badminton_bilangan')->nullable();

            $table->boolean('badminton_dewan')->default(false);
            $table->boolean('badminton_dewan_gunasama')->nullable();
            $table->integer('badminton_dewan_bilangan')->nullable();
            $table->boolean('badminton_dewan_masih_digunakan')->nullable();
            $table->integer('badminton_dewan_status_fizikal')->nullable();

            $table->boolean('badminton_berbumbung')->default(false);
            $table->boolean('badminton_berbumbung_gunasama')->nullable();
            $table->integer('badminton_berbumbung_bilangan')->nullable();
            $table->boolean('badminton_berbumbung_masih_digunakan')->nullable();
            $table->integer('badminton_berbumbung_status_fizikal')->nullable();

            $table->boolean('badminton_terbuka')->default(false);
            $table->boolean('badminton_terbuka_gunasama')->nullable();
            $table->integer('badminton_terbuka_bilangan')->nullable();
            $table->boolean('badminton_terbuka_masih_digunakan')->nullable();
            $table->integer('badminton_terbuka_status_fizikal')->nullable();

            //Kriket
            $table->boolean('kriket');
            $table->integer('kriket_bilangan')->nullable();
            
            $table->boolean('kriket_standard')->default(false);
            $table->boolean('kriket_standard_gunasama')->nullable();
            $table->integer('kriket_standard_bilangan')->nullable();
            $table->boolean('kriket_standard_masih_digunakan')->nullable();
            $table->integer('kriket_standard_status_fizikal')->nullable();

            $table->boolean('kriket_latihan')->default(false);
            $table->boolean('kriket_latihan_gunasama')->nullable();
            $table->integer('kriket_latihan_bilangan')->nullable();
            $table->boolean('kriket_latihan_masih_digunakan')->nullable();
            $table->integer('kriket_latihan_status_fizikal')->nullable();

            //Tenis
            $table->boolean('tenis');
            $table->integer('tenis_bilangan')->nullable();

            $table->boolean('tenis_terbuka')->default(false);
            $table->boolean('tenis_terbuka_gunasama')->nullable();
            $table->integer('tenis_terbuka_bilangan')->nullable();
            $table->boolean('tenis_terbuka_masih_digunakan')->nullable();
            $table->integer('tenis_terbuka_status_fizikal')->nullable();

            //Ping pong
            $table->boolean('ping_pong');
            $table->integer('ping_pong_bilangan')->nullable();

            $table->boolean('pp_tertutup')->default(false);
            $table->boolean('pp_tertutup_gunasama')->nullable();
            $table->integer('pp_tertutup_bilangan')->nullable();
            $table->boolean('pp_tertutup_masih_digunakan')->nullable();
            $table->integer('pp_tertutup_status_fizikal')->nullable();

            $table->boolean('pp_terbuka')->default(false);
            $table->boolean('pp_terbuka_gunasama')->nullable();
            $table->integer('pp_terbuka_bilangan')->nullable();
            $table->boolean('pp_terbuka_masih_digunakan')->nullable();
            $table->integer('pp_terbuka_status_fizikal')->nullable();

            //Sofbol
            $table->boolean('sofbol');
            $table->integer('sofbol_bilangan')->nullable();

            $table->boolean('sofbol_standard')->default(false);
            $table->boolean('sofbol_standard_gunasama')->nullable();
            $table->integer('sofbol_standard_bilangan')->nullable();
            $table->boolean('sofbol_standard_masih_digunakan')->nullable();
            $table->integer('sofbol_standard_status_fizikal')->nullable();

            $table->boolean('sofbol_latihan')->default(false);
            $table->boolean('sofbol_latihan_gunasama')->nullable();
            $table->integer('sofbol_latihan_bilangan')->nullable();
            $table->boolean('sofbol_latihan_masih_digunakan')->nullable();
            $table->integer('sofbol_latihan_status_fizikal')->nullable();

            //Memanah
            $table->boolean('memanah');
            $table->integer('memanah_bilangan')->nullable();
            
            $table->boolean('memanah_standard')->default(false);
            $table->boolean('memanah_standard_gunasama')->nullable();
            $table->integer('memanah_standard_bilangan')->nullable();
            $table->boolean('memanah_standard_masih_digunakan')->nullable();
            $table->integer('memanah_standard_status_fizikal')->nullable();

            $table->boolean('memanah_latihan')->default(false);
            $table->boolean('memanah_latihan_gunasama')->nullable();
            $table->integer('memanah_latihan_bilangan')->nullable();
            $table->boolean('memanah_latihan_masih_digunakan')->nullable();
            $table->integer('memanah_latihan_status_fizikal')->nullable();

            //Skuasy
            $table->boolean('skuasy');
            $table->integer('skuasy_bilangan')->nullable();

            $table->boolean('skuasy_dewan')->default(false);
            $table->boolean('skuasy_dewan_gunasama')->nullable();
            $table->integer('skuasy_dewan_bilangan')->nullable();
            $table->boolean('skuasy_dewan_masih_digunakan')->nullable();
            $table->integer('skuasy_dewan_status_fizikal')->nullable();

            //Gimnastik Artistik
            $table->boolean('gimnastik_artistik');
            $table->integer('gimnastik_artistik_bilangan')->nullable();

            $table->boolean('ga_standard')->default(false);
            $table->boolean('ga_standard_gunasama')->nullable();
            $table->integer('ga_standard_bilangan')->nullable();
            $table->boolean('ga_standard_masih_digunakan')->nullable();
            $table->integer('ga_standard_status_fizikal')->nullable();

            $table->boolean('ga_latihan')->default(false);
            $table->boolean('ga_latihan_gunasama')->nullable();
            $table->integer('ga_latihan_bilangan')->nullable();
            $table->boolean('ga_latihan_masih_digunakan')->nullable();
            $table->integer('ga_latihan_status_fizikal')->nullable();

            //Gimnastik Berirama
            $table->boolean('gimnastik_berirama');
            $table->integer('gimnastik_berirama_bilangan')->nullable();

            $table->boolean('gb_standard')->default(false);
            $table->boolean('gb_standard_gunasama')->nullable();
            $table->integer('gb_standard_bilangan')->nullable();
            $table->boolean('gb_standard_masih_digunakan')->nullable();
            $table->integer('gb_standard_status_fizikal')->nullable();

            $table->boolean('gb_latihan')->default(false);
            $table->boolean('gb_latihan_gunasama')->nullable();
            $table->integer('gb_latihan_bilangan')->nullable();
            $table->boolean('gb_latihan_masih_digunakan')->nullable();
            $table->integer('gb_latihan_status_fizikal')->nullable();

            //Bola Baling
            $table->boolean('bola_baling');
            $table->integer('bola_baling_bilangan')->nullable();

            $table->boolean('bb_dewan')->default(false);
            $table->boolean('bb_dewan_gunasama')->nullable();
            $table->integer('bb_dewan_bilangan')->nullable();
            $table->boolean('bb_dewan_masih_digunakan')->nullable();
            $table->integer('bb_dewan_status_fizikal')->nullable();

            $table->boolean('bb_berbumbung')->default(false);
            $table->boolean('bb_berbumbung_gunasama')->nullable();
            $table->integer('bb_berbumbung_bilangan')->nullable();
            $table->boolean('bb_berbumbung_masih_digunakan')->nullable();
            $table->integer('bb_berbumbung_status_fizikal')->nullable();

            $table->boolean('bb_hardcourt')->default(false);
            $table->boolean('bb_hardcourt_gunasama')->nullable();
            $table->integer('bb_hardcourt_bilangan')->nullable();
            $table->boolean('bb_hardcourt_masih_digunakan')->nullable();
            $table->integer('bb_hardcourt_status_fizikal')->nullable();

            $table->boolean('bb_berumput')->default(false);
            $table->boolean('bb_berumput_gunasama')->nullable();
            $table->integer('bb_berumput_bilangan')->nullable();
            $table->boolean('bb_berumput_masih_digunakan')->nullable();
            $table->integer('bb_berumput_status_fizikal')->nullable();

            //Bola Keranjang
            $table->boolean('bola_keranjang');
            $table->integer('bola_keranjang_bilangan')->nullable();

            $table->boolean('bk_dewan')->default(false);
            $table->boolean('bk_dewan_gunasama')->nullable();
            $table->integer('bk_dewan_bilangan')->nullable();
            $table->boolean('bk_dewan_masih_digunakan')->nullable();
            $table->integer('bk_dewan_status_fizikal')->nullable();

            $table->boolean('bk_berbumbung')->default(false);
            $table->boolean('bk_berbumbung_gunasama')->nullable();
            $table->integer('bk_berbumbung_bilangan')->nullable();
            $table->boolean('bk_berbumbung_masih_digunakan')->nullable();
            $table->integer('bk_berbumbung_status_fizikal')->nullable();

            $table->boolean('bk_terbuka')->default(false);
            $table->boolean('bk_terbuka_gunasama')->nullable();
            $table->integer('bk_terbuka_bilangan')->nullable();
            $table->boolean('bk_terbuka_masih_digunakan')->nullable();
            $table->integer('bk_terbuka_status_fizikal')->nullable();

            //Ragbi
            $table->boolean('ragbi');
            $table->integer('ragbi_bilangan')->nullable();

            $table->boolean('ragbi_standard')->default(false);
            $table->boolean('ragbi_standard_gunasama')->nullable();
            $table->integer('ragbi_standard_bilangan')->nullable();
            $table->boolean('ragbi_standard_masih_digunakan')->nullable();
            $table->integer('ragbi_standard_status_fizikal')->nullable();

            $table->boolean('ragbi_latihan')->default(false);
            $table->boolean('ragbi_latihan_gunasama')->nullable();
            $table->integer('ragbi_latihan_bilangan')->nullable();
            $table->boolean('ragbi_latihan_masih_digunakan')->nullable();
            $table->integer('ragbi_latihan_status_fizikal')->nullable();

            //Futsal
            $table->boolean('futsal');
            $table->integer('futsal_bilangan')->nullable();

            $table->boolean('futsal_dewan')->default(false);
            $table->boolean('futsal_dewan_gunasama')->nullable();
            $table->integer('futsal_dewan_bilangan')->nullable();
            $table->boolean('futsal_dewan_masih_digunakan')->nullable();
            $table->integer('futsal_dewan_status_fizikal')->nullable();

            $table->boolean('futsal_berbumbung')->default(false);
            $table->boolean('futsal_berbumbung_gunasama')->nullable();
            $table->integer('futsal_berbumbung_bilangan')->nullable();
            $table->boolean('futsal_berbumbung_masih_digunakan')->nullable();
            $table->integer('futsal_berbumbung_status_fizikal')->nullable();

            $table->boolean('futsal_terbuka')->default(false);
            $table->boolean('futsal_terbuka_gunasama')->nullable();
            $table->integer('futsal_terbuka_bilangan')->nullable();
            $table->boolean('futsal_terbuka_masih_digunakan')->nullable();
            $table->integer('futsal_terbuka_status_fizikal')->nullable();

            //Boling Tenpin
            $table->boolean('boling_tenpin');
            $table->integer('boling_tenpin_bilangan')->nullable();

            $table->boolean('bt_8')->default(false);
            $table->boolean('bt_8_gunasama')->nullable();
            $table->integer('bt_8_bilangan')->nullable();
            $table->boolean('bt_8_masih_digunakan')->nullable();
            $table->integer('bt_8_status_fizikal')->nullable();

            $table->boolean('bt_12')->default(false);
            $table->boolean('bt_12_gunasama')->nullable();
            $table->integer('bt_12_bilangan')->nullable();
            $table->boolean('bt_12_masih_digunakan')->nullable();
            $table->integer('bt_12_status_fizikal')->nullable();

            $table->boolean('bt_lain')->default(false);
            $table->string('bt_lain_butiran')->nullable();
            $table->boolean('bt_lain_gunasama')->nullable();
            $table->integer('bt_lain_bilangan')->nullable();
            $table->boolean('bt_lain_masih_digunakan')->nullable();
            $table->integer('bt_lain_status_fizikal')->nullable();

            //Lain-lain
            $table->boolean('lain');
            $table->boolean('lain_bilangan')->nullable();

            $table->boolean('lain_kemudahan')->default(false);
            $table->string('lain_kemudahan_butiran')->nullable();
            $table->boolean('lain_kemudahan_gunasama')->nullable();
            $table->integer('lain_kemudahan_bilangan')->nullable();
            $table->boolean('lain_kemudahan_masih_digunakan')->nullable();
            $table->integer('lain_kemudahan_status_fizikal')->nullable();

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ikeps_kemudahan_sukan');
    }
};
