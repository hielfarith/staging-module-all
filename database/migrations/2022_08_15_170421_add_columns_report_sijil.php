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
        //
        Schema::table('report_sijil', function (Blueprint $table) {
            $table->string('signee_one')->nullable();
            $table->string('signee_two')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('report_sijil', function (Blueprint $table) {
            $table->dropColumn('signee_one');
            $table->dropColumn('signee_two');
        });
    }
};
