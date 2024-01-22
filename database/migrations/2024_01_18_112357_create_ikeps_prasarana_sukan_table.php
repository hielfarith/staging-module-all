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
        Schema::create('ikeps_prasarana_sukan', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('kod_sekolah');

            //Pemeriksaan Keselamatan
            $table->boolean('pemeriksaan_keselamatan');
            $table->date('tarikh_pemeriksaan')->nullable();

            //Padang Sekolah
            $table->boolean('padang_sekolah');
            $table->boolean('padang_sekolah_gunasama')->nullable();
            $table->integer('padang_sekolah_bilangan')->nullable();

            $table->boolean('status_padang')->nullable();
            $table->string('status_padang_butiran')->nullable();

            //Keluasan Trek 400M
            $table->boolean('kt_400')->default(false);
            $table->boolean('kt_400_gunasama')->nullable();
            $table->integer('kt_400_bilangan')->nullable();
            $table->boolean('kt_400_masih_digunakan')->nullable();
            $table->integer('kt_400_status_fizikal')->nullable();

            //Keluasan Trek 300M
            $table->boolean('kt_300')->default(false);
            $table->boolean('kt_300_gunasama')->nullable();
            $table->integer('kt_300_bilangan')->nullable();
            $table->boolean('kt_300_masih_digunakan')->nullable();
            $table->integer('kt_300_status_fizikal')->nullable();

            //Keluasan Trek 200M
            $table->boolean('kt_200')->default(false);
            $table->boolean('kt_200_gunasama')->nullable();
            $table->integer('kt_200_bilangan')->nullable();
            $table->boolean('kt_200_masih_digunakan')->nullable();
            $table->integer('kt_200_status_fizikal')->nullable();

            //Keluasan Trek Kurang 200M
            $table->boolean('ktk_200')->default(false);
            $table->boolean('ktk_200_gunasama')->nullable();
            $table->integer('ktk_200_bilangan')->nullable();
            $table->boolean('ktk_200_masih_digunakan')->nullable();
            $table->integer('ktk_200_status_fizikal')->nullable();

            //Gred Padang
            $table->string('gred_padang')->nullable();

            //Trek Sintetik
            $table->boolean('trek_sintetik');
            $table->integer('trek_sintetik_bilangan')->nullable();

            //Trek 400M
            $table->boolean('trek_400')->default(false);
            $table->boolean('trek_400_gunasama')->nullable();
            $table->integer('trek_400_bilangan')->nullable();
            $table->boolean('trek_400_masih_digunakan')->nullable();
            $table->integer('trek_400_status_fizikal')->nullable();

            //Trek 200M
            $table->boolean('trek_200')->default(false);
            $table->boolean('trek_200_gunasama')->nullable();
            $table->integer('trek_200_bilangan')->nullable();
            $table->boolean('trek_200_masih_digunakan')->nullable();
            $table->integer('trek_200_status_fizikal')->nullable();

            //Trek Lain-Lain
            $table->boolean('trek_lain')->default(false);
            $table->string('trek_lain_butiran')->nullable();
            $table->boolean('trek_lain_gunasama')->nullable();
            $table->integer('trek_lain_bilangan')->nullable();
            $table->boolean('trek_lain_masih_digunakan')->nullable();
            $table->integer('trek_lain_status_fizikal')->nullable();

            //Astaka
            $table->boolean('astaka');
            $table->integer('astaka_bilangan')->nullable();

            //Kapasiti Melebihi 500
            $table->boolean('km_500')->default(false);
            $table->boolean('km_500_gunasama')->nullable();
            $table->integer('km_500_bilangan')->nullable();
            $table->boolean('km_500_masih_digunakan')->nullable();
            $table->integer('km_500_status_fizikal')->nullable();

            //Kapasiti Kurang 500
            $table->boolean('kk_500')->default(false);
            $table->boolean('kk_500_gunasama')->nullable();
            $table->integer('kk_500_bilangan')->nullable();
            $table->boolean('kk_500_masih_digunakan')->nullable();
            $table->integer('kk_500_status_fizikal')->nullable();

            //Dewan
            $table->boolean('dewan');
            $table->integer('dewan_bilangan')->nullable();

            //Dewan Besar
            $table->boolean('dewan_besar')->default(false);
            $table->boolean('dewan_besar_gunasama')->nullable();
            $table->integer('dewan_besar_bilangan')->nullable();
            $table->boolean('dewan_besar_masih_digunakan')->nullable();
            $table->integer('dewan_besar_status_fizikal')->nullable();

            //Dewan Khas Untuk Sukan
            $table->boolean('dewan_khas')->default(false);
            $table->boolean('dewan_khas_gunasama')->nullable();
            $table->integer('dewan_khas_bilangan')->nullable();
            $table->boolean('dewan_khas_masih_digunakan')->nullable();
            $table->integer('dewan_khas_status_fizikal')->nullable();

            //Bilik Peralatan Sukan
            $table->boolean('bilik_sukan');
            $table->integer('bilik_sukan_bilangan')->nullable();

            //Stor 1 Bay
            $table->boolean('stor_1')->default(false);
            $table->boolean('stor_1_gunasama')->nullable();
            $table->integer('stor_1_bilangan')->nullable();
            $table->boolean('stor_1_masih_digunakan')->nullable();
            $table->integer('stor_1_status_fizikal')->nullable();

            //Stor 2 Bay
            $table->boolean('stor_2')->default(false);
            $table->boolean('stor_2_gunasama')->nullable();
            $table->integer('stor_2_bilangan')->nullable();
            $table->boolean('stor_2_masih_digunakan')->nullable();
            $table->integer('stor_2_status_fizikal')->nullable();

            //Stor 3 Bay
            $table->boolean('stor_3')->default(false);
            $table->boolean('stor_3_gunasama')->nullable();
            $table->integer('stor_3_bilangan')->nullable();
            $table->boolean('stor_3_masih_digunakan')->nullable();
            $table->integer('stor_3_status_fizikal')->nullable();

            //Bilik Persalinan
            $table->boolean('bilik_persalinan');
            $table->integer('bilik_persalinan_bilangan')->nullable();

            //Murid Lelaki
            $table->boolean('murid_lelaki')->default(false);
            $table->boolean('murid_lelaki_gunasama')->nullable();
            $table->integer('murid_lelaki_bilangan')->nullable();
            $table->boolean('murid_lelaki_masih_digunakan')->nullable();
            $table->integer('murid_lelaki_status_fizikal')->nullable();

            //Murid Perempuan
            $table->boolean('murid_perempuan')->default(false);
            $table->boolean('murid_perempuan_gunasama')->nullable();
            $table->integer('murid_perempuan_bilangan')->nullable();
            $table->boolean('murid_perempuan_masih_digunakan')->nullable();
            $table->integer('murid_perempuan_status_fizikal')->nullable();

            //Gelanggang Serbaguna
            $table->boolean('gelanggang_serbaguna');
            $table->integer('gelanggang_serbaguna_bilangan')->nullable();

            //Terbuka Berbumbung
            $table->boolean('terbuka_berbumbung')->default(false);
            $table->boolean('terbuka_berbumbung_gunasama')->nullable();
            $table->integer('terbuka_berbumbung_bilangan')->nullable();
            $table->boolean('terbuka_berbumbung_masih_digunakan')->nullable();
            $table->integer('terbuka_berbumbung_status_fizikal')->nullable();

            //Terbuka 
            $table->boolean('terbuka')->default(false);
            $table->boolean('terbuka_gunasama')->nullable();
            $table->integer('terbuka_bilangan')->nullable();
            $table->boolean('terbuka_masih_digunakan')->nullable();
            $table->integer('terbuka_status_fizikal')->nullable();

            //Bilik Kecergasan
            $table->boolean('bilik_kecergasan');
            $table->boolean('bilik_kecergasan_gunasama')->nullable();
            $table->integer('bilik_kecergasan_bilangan')->nullable();
            $table->boolean('bilik_kecergasan_masih_digunakan')->nullable();
            $table->integer('bilik_kecergasan_status_fizikal')->nullable();

            //Makmal Sains Sukan
            $table->boolean('makmal_sains');
            $table->boolean('makmal_sains_gunasama')->nullable();
            $table->integer('makmal_sains_bilangan')->nullable();
            $table->boolean('makmal_sains_masih_digunakan')->nullable();
            $table->integer('makmal_sains_status_fizikal')->nullable();

            //Kolam Renang
            $table->boolean('kolam_renang');
            $table->boolean('kolam_renang_gunasama')->nullable();
            $table->integer('kolam_renang_bilangan')->nullable();
            $table->boolean('kolam_renang_masih_digunakan')->nullable();
            $table->integer('kolam_renang_status_fizikal')->nullable();

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
        Schema::dropIfExists('ikeps_prasarana_sukan');
    }
};
