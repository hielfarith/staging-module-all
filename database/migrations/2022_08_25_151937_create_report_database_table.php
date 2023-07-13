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
        Schema::create('report_database', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->string('title')->nullable();
            $table->integer('month')->nullable();
			$table->integer('year')->nullable();
            $table->integer('status')->nullable();
            $table->string('nama_penyemak')->nullable();
            $table->string('jawatan_penyemak')->nullable();
            $table->date('tarikh_disemak')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->string('jawatan_penyedia')->nullable();
            $table->date('tarikh_disediakan')->nullable();
            $table->string('title_original')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_database');
    }
};
