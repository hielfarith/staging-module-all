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
        if (Schema::hasTable('timeline_duration')) {
            Schema::table('timeline_duration', function (Blueprint $table) {
                $table->foreign('projects_id')->references(['id'])->on('projects');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timeline', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
        });

    }
};
