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

        Schema::table('report_application', function (Blueprint $table) {
            $table->string('nama_penyedia')->nullable();
            $table->string('jawatan_penyedia')->nullable();
            $table->date('tarikh_disediakan')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_application', function (Blueprint $table) {
            $table->dropColumn('nama_penyedia');
            $table->dropColumn('jawatan_penyedia');
            $table->dropColumn('tarikh_disediakan');
        });
    }
};
