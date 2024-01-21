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
        Schema::create('ikeps_status_pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('kod_sekolah');

            $table->integer('akuatik_zon')->nullable();
            $table->integer('akuatik_daerah')->nullable(); 
            $table->integer('akuatik_bahagian')->nullable();
            $table->integer('akuatik_negeri')->nullable();
            $table->integer('akuatik_kebangsaan')->nullable();
            $table->integer('akuatik_antarabangsa')->nullable();

            $table->integer('badminton_zon')->nullable();
            $table->integer('badminton_daerah')->nullable(); 
            $table->integer('badminton_bahagian')->nullable();
            $table->integer('badminton_negeri')->nullable();
            $table->integer('badminton_kebangsaan')->nullable();
            $table->integer('badminton_antarabangsa')->nullable();

            $table->integer('bola_baling_zon')->nullable();
            $table->integer('bola_baling_daerah')->nullable(); 
            $table->integer('bola_baling_bahagian')->nullable();
            $table->integer('bola_baling_negeri')->nullable();
            $table->integer('bola_baling_kebangsaan')->nullable();
            $table->integer('bola_baling_antarabangsa')->nullable();

            $table->integer('bola_jaring_zon')->nullable();
            $table->integer('bola_jaring_daerah')->nullable(); 
            $table->integer('bola_jaring_bahagian')->nullable();
            $table->integer('bola_jaring_negeri')->nullable();
            $table->integer('bola_jaring_kebangsaan')->nullable();
            $table->integer('bola_jaring_antarabangsa')->nullable();

            $table->integer('bola_keranjang_zon')->nullable();
            $table->integer('bola_keranjang_daerah')->nullable(); 
            $table->integer('bola_keranjang_bahagian')->nullable();
            $table->integer('bola_keranjang_negeri')->nullable();
            $table->integer('bola_keranjang_kebangsaan')->nullable();
            $table->integer('bola_keranjang_antarabangsa')->nullable();

            $table->integer('bola_sepak_zon')->nullable();
            $table->integer('bola_sepak_daerah')->nullable(); 
            $table->integer('bola_sepak_bahagian')->nullable();
            $table->integer('bola_sepak_negeri')->nullable();
            $table->integer('bola_sepak_kebangsaan')->nullable();
            $table->integer('bola_sepak_antarabangsa')->nullable();

            $table->integer('bola_tampar_zon')->nullable();
            $table->integer('bola_tampar_daerah')->nullable(); 
            $table->integer('bola_tampar_bahagian')->nullable();
            $table->integer('bola_tampar_negeri')->nullable();
            $table->integer('bola_tampar_kebangsaan')->nullable();
            $table->integer('bola_tampar_antarabangsa')->nullable();

            $table->integer('boling_tenpin_zon')->nullable();
            $table->integer('boling_tenpin_daerah')->nullable(); 
            $table->integer('boling_tenpin_bahagian')->nullable();
            $table->integer('boling_tenpin_negeri')->nullable();
            $table->integer('boling_tenpin_kebangsaan')->nullable();
            $table->integer('boling_tenpin_antarabangsa')->nullable();

            $table->integer('gimnastik_artistik_zon')->nullable();
            $table->integer('gimnastik_artistik_daerah')->nullable(); 
            $table->integer('gimnastik_artistik_bahagian')->nullable();
            $table->integer('gimnastik_artistik_negeri')->nullable();
            $table->integer('gimnastik_artistik_kebangsaan')->nullable();
            $table->integer('gimnastik_artistik_antarabangsa')->nullable();

            $table->integer('gimnastik_berirama_zon')->nullable();
            $table->integer('gimnastik_berirama_daerah')->nullable(); 
            $table->integer('gimnastik_berirama_bahagian')->nullable();
            $table->integer('gimnastik_berirama_negeri')->nullable();
            $table->integer('gimnastik_berirama_kebangsaan')->nullable();
            $table->integer('gimnastik_berirama_antarabangsa')->nullable();

            $table->integer('golf_zon')->nullable();
            $table->integer('golf_daerah')->nullable(); 
            $table->integer('golf_bahagian')->nullable();
            $table->integer('golf_negeri')->nullable();
            $table->integer('golf_kebangsaan')->nullable();
            $table->integer('golf_antarabangsa')->nullable();

            $table->integer('hoki_zon')->nullable();
            $table->integer('hoki_daerah')->nullable(); 
            $table->integer('hoki_bahagian')->nullable();
            $table->integer('hoki_negeri')->nullable();
            $table->integer('hoki_kebangsaan')->nullable();
            $table->integer('hoki_antarabangsa')->nullable();

            $table->integer('kriket_zon')->nullable();
            $table->integer('kriket_daerah')->nullable(); 
            $table->integer('kriket_bahagian')->nullable();
            $table->integer('kriket_negeri')->nullable();
            $table->integer('kriket_kebangsaan')->nullable();
            $table->integer('kriket_antarabangsa')->nullable();

            $table->integer('memanah_zon')->nullable();
            $table->integer('memanah_daerah')->nullable(); 
            $table->integer('memanah_bahagian')->nullable();
            $table->integer('memanah_negeri')->nullable();
            $table->integer('memanah_kebangsaan')->nullable();
            $table->integer('memanah_antarabangsa')->nullable();

            $table->integer('merentas_desa_zon')->nullable();
            $table->integer('merentas_desa_daerah')->nullable(); 
            $table->integer('merentas_desa_bahagian')->nullable();
            $table->integer('merentas_desa_negeri')->nullable();
            $table->integer('merentas_desa_kebangsaan')->nullable();
            $table->integer('merentas_desa_antarabangsa')->nullable();

            $table->integer('olahraga_zon')->nullable();
            $table->integer('olahraga_daerah')->nullable(); 
            $table->integer('olahraga_bahagian')->nullable();
            $table->integer('olahraga_negeri')->nullable();
            $table->integer('olahraga_kebangsaan')->nullable();
            $table->integer('olahraga_antarabangsa')->nullable();

            $table->integer('pelayaran_zon')->nullable();
            $table->integer('pelayaran_daerah')->nullable(); 
            $table->integer('pelayaran_bahagian')->nullable();
            $table->integer('pelayaran_negeri')->nullable();
            $table->integer('pelayaran_kebangsaan')->nullable();
            $table->integer('pelayaran_antarabangsa')->nullable();

            $table->integer('ping_pong_zon')->nullable();
            $table->integer('ping_pong_daerah')->nullable(); 
            $table->integer('ping_pong_bahagian')->nullable();
            $table->integer('ping_pong_negeri')->nullable();
            $table->integer('ping_pong_kebangsaan')->nullable();
            $table->integer('ping_pong_antarabangsa')->nullable();

            $table->integer('ragbi_zon')->nullable();
            $table->integer('ragbi_daerah')->nullable(); 
            $table->integer('ragbi_bahagian')->nullable();
            $table->integer('ragbi_negeri')->nullable();
            $table->integer('ragbi_kebangsaan')->nullable();
            $table->integer('ragbi_antarabangsa')->nullable();

            $table->integer('sepak_takraw_zon')->nullable();
            $table->integer('sepak_takraw_daerah')->nullable(); 
            $table->integer('sepak_takraw_bahagian')->nullable();
            $table->integer('sepak_takraw_negeri')->nullable();
            $table->integer('sepak_takraw_kebangsaan')->nullable();
            $table->integer('sepak_takraw_antarabangsa')->nullable();
            
            $table->integer('skuasy_zon')->nullable();
            $table->integer('skuasy_daerah')->nullable(); 
            $table->integer('skuasy_bahagian')->nullable();
            $table->integer('skuasy_negeri')->nullable();
            $table->integer('skuasy_kebangsaan')->nullable();
            $table->integer('skuasy_antarabangsa')->nullable();

            $table->integer('sofbol_zon')->nullable();
            $table->integer('sofbol_daerah')->nullable(); 
            $table->integer('sofbol_bahagian')->nullable();
            $table->integer('sofbol_negeri')->nullable();
            $table->integer('sofbol_kebangsaan')->nullable();
            $table->integer('sofbol_antarabangsa')->nullable();

            $table->integer('tenis_zon')->nullable();
            $table->integer('tenis_daerah')->nullable(); 
            $table->integer('tenis_bahagian')->nullable();
            $table->integer('tenis_negeri')->nullable();
            $table->integer('tenis_kebangsaan')->nullable();
            $table->integer('tenis_antarabangsa')->nullable();

            $table->integer('angkat_berat_zon')->nullable();
            $table->integer('angkat_berat_daerah')->nullable(); 
            $table->integer('angkat_berat_bahagian')->nullable();
            $table->integer('angkat_berat_negeri')->nullable();
            $table->integer('angkat_berat_kebangsaan')->nullable();
            $table->integer('angkat_berat_antarabangsa')->nullable();

            $table->integer('ekuestrian_zon')->nullable();
            $table->integer('ekuestrian_daerah')->nullable(); 
            $table->integer('ekuestrian_bahagian')->nullable();
            $table->integer('ekuestrian_negeri')->nullable();
            $table->integer('ekuestrian_kebangsaan')->nullable();
            $table->integer('ekuestrian_antarabangsa')->nullable();

            $table->integer('formula_future_zon')->nullable();
            $table->integer('formula_future_daerah')->nullable(); 
            $table->integer('formula_future_bahagian')->nullable();
            $table->integer('formula_future_negeri')->nullable();
            $table->integer('formula_future_kebangsaan')->nullable();
            $table->integer('formula_future_antarabangsa')->nullable();

            $table->integer('futsal_zon')->nullable();
            $table->integer('futsal_daerah')->nullable(); 
            $table->integer('futsal_bahagian')->nullable();
            $table->integer('futsal_negeri')->nullable();
            $table->integer('futsal_kebangsaan')->nullable();
            $table->integer('futsal_antarabangsa')->nullable();      
            
            $table->integer('kabaddi_zon')->nullable();
            $table->integer('kabaddi_daerah')->nullable(); 
            $table->integer('kabaddi_bahagian')->nullable();
            $table->integer('kabaddi_negeri')->nullable();
            $table->integer('kabaddi_kebangsaan')->nullable();
            $table->integer('kabaddi_antarabangsa')->nullable();

            $table->integer('lawn_bowl_zon')->nullable();
            $table->integer('lawn_bowl_daerah')->nullable(); 
            $table->integer('lawn_bowl_bahagian')->nullable();
            $table->integer('lawn_bowl_negeri')->nullable();
            $table->integer('lawn_bowl_kebangsaan')->nullable();
            $table->integer('lawn_bowl_antarabangsa')->nullable();

            $table->integer('lumba_basikal_zon')->nullable();
            $table->integer('lumba_basikal_daerah')->nullable(); 
            $table->integer('lumba_basikal_bahagian')->nullable();
            $table->integer('lumba_basikal_negeri')->nullable();
            $table->integer('lumba_basikal_kebangsaan')->nullable();
            $table->integer('lumba_basikal_antarabangsa')->nullable();

            $table->integer('menembak_zon')->nullable();
            $table->integer('menembak_daerah')->nullable(); 
            $table->integer('menembak_bahagian')->nullable();
            $table->integer('menembak_negeri')->nullable();
            $table->integer('menembak_kebangsaan')->nullable();
            $table->integer('menembak_antarabangsa')->nullable();

            $table->integer('muay_thai_zon')->nullable();
            $table->integer('muay_thai_daerah')->nullable(); 
            $table->integer('muay_thai_bahagian')->nullable();
            $table->integer('muay_thai_negeri')->nullable();
            $table->integer('muay_thai_kebangsaan')->nullable();
            $table->integer('muay_thai_antarabangsa')->nullable();

            $table->integer('petanque_zon')->nullable();
            $table->integer('petanque_daerah')->nullable(); 
            $table->integer('petanque_bahagian')->nullable();
            $table->integer('petanque_negeri')->nullable();
            $table->integer('petanque_kebangsaan')->nullable();
            $table->integer('petanque_antarabangsa')->nullable();
            
            $table->integer('silambam_zon')->nullable();
            $table->integer('silambam_daerah')->nullable(); 
            $table->integer('silambam_bahagian')->nullable();
            $table->integer('silambam_negeri')->nullable();
            $table->integer('silambam_kebangsaan')->nullable();
            $table->integer('silambam_antarabangsa')->nullable();

            $table->integer('silat_olahraga_zon')->nullable();
            $table->integer('silat_olahraga_daerah')->nullable(); 
            $table->integer('silat_olahraga_bahagian')->nullable();
            $table->integer('silat_olahraga_negeri')->nullable();
            $table->integer('silat_olahraga_kebangsaan')->nullable();
            $table->integer('silat_olahraga_antarabangsa')->nullable();

            $table->integer('taekwondo_zon')->nullable();
            $table->integer('taekwondo_daerah')->nullable(); 
            $table->integer('taekwondo_bahagian')->nullable();
            $table->integer('taekwondo_negeri')->nullable();
            $table->integer('taekwondo_kebangsaan')->nullable();
            $table->integer('taekwondo_antarabangsa')->nullable();

            $table->integer('tinju_zon')->nullable();
            $table->integer('tinju_daerah')->nullable(); 
            $table->integer('tinju_bahagian')->nullable();
            $table->integer('tinju_negeri')->nullable();
            $table->integer('tinju_kebangsaan')->nullable();
            $table->integer('tinju_antarabangsa')->nullable();

            $table->integer('wushu_zon')->nullable();
            $table->integer('wushu_daerah')->nullable(); 
            $table->integer('wushu_bahagian')->nullable();
            $table->integer('wushu_negeri')->nullable();
            $table->integer('wushu_kebangsaan')->nullable();
            $table->integer('wushu_antarabangsa')->nullable();

            $table->string('lain_1_butiran')->nullable();
            $table->integer('lain_1_zon')->nullable();
            $table->integer('lain_1_daerah')->nullable(); 
            $table->integer('lain_1_bahagian')->nullable();
            $table->integer('lain_1_negeri')->nullable();
            $table->integer('lain_1_kebangsaan')->nullable();
            $table->integer('lain_1_antarabangsa')->nullable();

            $table->string('lain_2_butiran')->nullable();
            $table->integer('lain_2_zon')->nullable();
            $table->integer('lain_2_daerah')->nullable(); 
            $table->integer('lain_2_bahagian')->nullable();
            $table->integer('lain_2_negeri')->nullable();
            $table->integer('lain_2_kebangsaan')->nullable();
            $table->integer('lain_2_antarabangsa')->nullable();

            $table->string('lain_3_butiran')->nullable();
            $table->integer('lain_3_zon')->nullable();
            $table->integer('lain_3_daerah')->nullable(); 
            $table->integer('lain_3_bahagian')->nullable();
            $table->integer('lain_3_negeri')->nullable();
            $table->integer('lain_3_kebangsaan')->nullable();
            $table->integer('lain_3_antarabangsa')->nullable();


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
        Schema::dropIfExists('ikeps_status_pertanyaan');
    }
};
