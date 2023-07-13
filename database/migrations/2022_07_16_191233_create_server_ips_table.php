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
        Schema::create('pm_server_ips', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('project_server_id')->unsigned();
            $table->foreign('project_server_id')->references('id')->on('pm_project_servers');
            $table->string('ip_address')->nullable();

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
        Schema::dropIfExists('pm_server_ips');
    }
};
