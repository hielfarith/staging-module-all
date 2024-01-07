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
        Schema::table('profil_pengguna', function (Blueprint $table) {
            $table->string('alamat1');
            $table->string('alamat2');
            $table->string('alamat3')->nullable();
            $table->string('poskod', 6);
            $table->string('daerah');
            $table->string('negeri');
            $table->string('tarikh_penubuhan');
            $table->string('jenis_taska');
            $table->string('jumla_pendidik');
            $table->string('jumlah_kanak');
            $table->string('jumla_staf_sokogan');
            $table->string('jenisbanugunan');
            $table->string('no_tel_pejabat');
            $table->string('no_tel_peribadi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profil_pengguna', function (Blueprint $table) {
            $table->string('alamat1');
            $table->string('alamat2');
            $table->string('alamat3')->nullable();
            $table->string('poskod', 6);
            $table->string('daerah');
            $table->string('negeri');
            $table->string('tarikh_penubuhan');
            $table->string('jenis_taska');
            $table->string('jumla_pendidik');
            $table->string('jumlah_kanak');
            $table->string('jumla_staf_sokogan');
            $table->string('jenisbanugunan');
            $table->string('no_tel_pejabat');
            $table->string('no_tel_peribadi');        });
    }
};
