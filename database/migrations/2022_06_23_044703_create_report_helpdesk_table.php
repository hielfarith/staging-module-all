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
        Schema::create('report_helpdesk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->string('title')->nullable();
            $table->integer('week')->nullable();
            $table->integer('month')->nullable();
			$table->integer('year')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('nama_penyedia')->nullable();
            $table->string('jawatan_penyedia')->nullable();
            $table->date('tarikh_disediakan')->nullable();
            $table->string('nama_pengesah')->nullable();
            $table->string('jawatan_pengesah')->nullable();
            $table->date('tarikh_disahkan')->nullable();
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
        Schema::dropIfExists('report_helpdesk');
    }
};
