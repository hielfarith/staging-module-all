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
        Schema::table('skips_institusi_pendidikan', function (Blueprint $table) {
                $table->text('alamat_2')->nullable();
                $table->text('alamat_3')->nullable();
                $table->string('poskod')->nullable();
                $table->string('daerah')->nullable();
                $table->string('negeri')->nullable();
                $table->string('jpn')->nullable();
                $table->string('ppd')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skips_institusi_pendidikan', function (Blueprint $table) {
            $table->dropColumn(['alamat_2', 'alamat_3', 'poskod', 'daerah', 'negeri', 'jpn', 'ppd']);
        });
    }
};
