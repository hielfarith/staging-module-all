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
        Schema::create('project_abbreviations', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->longText('abbreviation')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('project_abbreviation');
    }
};
