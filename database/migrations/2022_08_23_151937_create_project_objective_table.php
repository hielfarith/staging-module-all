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
        Schema::create('project_objectives', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->integer('project_report_type_id')->nullable();
            $table->foreign('project_report_type_id')->references('id')->on('project_report_types');
            $table->integer('master_report_type_id')->nullable();
            $table->foreign('master_report_type_id')->references('id')->on('master_report_type');
            $table->text('objective')->nullable();
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
        Schema::dropIfExists('project_objectives');
    }
};
