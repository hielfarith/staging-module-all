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
        Schema::create('project_databases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->string('role')->nullable();
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
        Schema::dropIfExists('project_databases');
    }
};
