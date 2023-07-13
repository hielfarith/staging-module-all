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
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::table('report_sijil', function (Blueprint $table) {
            $table->integer('project_id')->after('id');
            $table->foreign('project_id')->references(['id'])->on('projects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_sijil', function (Blueprint $table) {
            $table->dropColumn('project_id');
        });
    }
};
