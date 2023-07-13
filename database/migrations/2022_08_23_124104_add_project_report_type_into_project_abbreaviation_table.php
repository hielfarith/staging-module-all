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
        Schema::table('project_abbreviations', function (Blueprint $table) {
            $table->integer('project_report_type_id')->nullable();
            $table->foreign('project_report_type_id')->references('id')->on('project_report_types');
            $table->integer('master_report_type_id')->nullable();
            $table->foreign('master_report_type_id')->references('id')->on('master_report_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::table('project_abbreviations', function (Blueprint $table) {
            $table->dropColumn('project_report_type_id');
            $table->dropColumn('master_report_type_id');
        });
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
};
