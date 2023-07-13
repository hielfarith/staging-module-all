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
        if (Schema::hasTable('timeline')) {
            Schema::table('timeline', function (Blueprint $table) {
                $table->foreign('projects_id')->references(['id'])->on('projects');
                $table->foreign('timeline_duration_id')->references(['id'])->on('timeline_duration');
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
            $table->dropForeign(['project_id','timeline_duration_id']);
        });

    }
};
