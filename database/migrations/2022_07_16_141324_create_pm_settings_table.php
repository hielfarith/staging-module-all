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
        Schema::create('pm_settings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');

            $table->integer('start_month')->nullable();
            $table->integer('start_year')->nullable();

            $table->integer('months_to_gen')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pm_settings');
    }
};
