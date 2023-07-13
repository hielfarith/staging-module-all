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
        Schema::create('report_application', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->string('title')->nullable();
            $table->integer('month')->nullable();
			$table->integer('year')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('nama_penyemak')->nullable();
            $table->string('jawatan_penyemak')->nullable();
            $table->date('tarikh_disemak')->nullable();
            $table->string('title_original')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_application');
    }
};
