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
        Schema::table('instrumen_skpak_spks_ikep', function (Blueprint $table) {
            $table->string('pengguna_instrumen')->nullable()->change();
            $table->string('pengisian_oleh')->nullable()->change();
            $table->string('pengesahan_ole')->nullable()->change();
            $table->string('verifikasi_oleh')->nullable()->change();
            $table->string('tempoh_pengisian')->nullable()->change();
            $table->string('tempoh_pengisian_lain')->nullable()->change();
            $table->string('tempoh_pengeshan')->nullable()->change();
            $table->string('tempoh_pengeshan_lain')->nullable()->change();
            $table->string('tempoh_verifikasi')->nullable()->change();
            $table->string('tempoh_verifikasi_lain')->nullable()->change();
            $table->string('kategori')->nullable()->change();
            $table->string('jenis_ips')->nullable()->change();

            $table->after('tempoh_pengisian_lain', function ($table) {
                $table->date('pengisian_dari')->nullable();
                $table->date('pengisian_hingga')->nullable();
                $table->string('institusi_pengisian')->nullable();
            });

            $table->after('tempoh_pengeshan_lain', function ($table) {
                $table->date('pengesahan_dari')->nullable();
                $table->date('pengesahan_hingga')->nullable();
                $table->string('institusi_pengesahan')->nullable();
            });

            $table->after('tempoh_verifikasi_lain', function ($table) {
                $table->date('verifikasi_dari')->nullable();
                $table->date('verifikasi_hingga')->nullable();
                $table->string('institusi_verifikasi')->nullable();
            });
            
            $table->after('tempoh_validasi_lain', function ($table) {
                $table->date('validasi_dari')->nullable();
                $table->date('validasi_hingga')->nullable();
                $table->string('institusi_validasi')->nullable();
            });

            $table->after('tempoh_perakuan_lain', function ($table) {
                $table->date('perakuan_dari')->nullable();
                $table->date('perakuan_hingga')->nullable();
                $table->string('institusi_perakuan')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instrumen_skpak_spks_ikep', function (Blueprint $table) {
            $table->dropColumn('perakuan_hingga');
            $table->dropColumn('perakuan_dari');
            $table->dropColumn('institusi_perakuan');

            $table->dropColumn('validasi_hingga');
            $table->dropColumn('validasi_dari');
            $table->dropColumn('institusi_validasi');

            $table->dropColumn('verifikasi_hingga');
            $table->dropColumn('verifikasi_dari');
            $table->dropColumn('institusi_verifikasi');

            $table->dropColumn('pengesahan_hingga');
            $table->dropColumn('pengesahan_dari');
            $table->dropColumn('institusi_pengesahan');

            $table->dropColumn('pengisian_hingga');
            $table->dropColumn('pengisian_dari');
            $table->dropColumn('institusi_pengisian');

            $table->string('tempoh_pengisian')->nullable(false)->change();
            $table->string('tempoh_pengisian_lain')->nullable(false)->change();
            $table->string('tempoh_pengeshan')->nullable(false)->change();
            $table->string('tempoh_pengeshan_lain')->nullable(false)->change();
            $table->string('tempoh_verifikasi')->nullable(false)->change();
            $table->string('tempoh_verifikasi_lain')->nullable(false)->change();
            $table->string('kategori')->nullable(false)->change();
            $table->string('jenis_ips')->nullable(false)->change();
            $table->string('verifikasi_oleh')->nullable(false)->change();
            $table->string('pengesahan_ole')->nullable(false)->change();
            $table->string('pengisian_oleh')->nullable(false)->change();
            $table->string('pengguna_instrumen')->nullable(false)->change();
        });
    }
};
