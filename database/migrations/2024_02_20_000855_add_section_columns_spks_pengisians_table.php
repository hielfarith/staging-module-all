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
        Schema::table('spks_pengisians', function (Blueprint $table) {
            $table->longText('aspek1_sectionb')->nullable();
            $table->longText('aspek1_sectionc')->nullable();
            $table->longText('aspek1_sectiond')->nullable();
            $table->string('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spks_pengisians', function (Blueprint $table) {
            $table->dropColumn(['aspek1_sectionb', 'aspek1_sectionc', 'aspek1_sectiond', 'remarks']);
        });
    }
};
