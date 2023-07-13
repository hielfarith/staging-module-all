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
        Schema::create('pm_resources_checklists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('server_checklist_id')->unsigned();
            $table->foreign('server_checklist_id')->references('id')->on('pm_server_checklists');

            $table->integer('cpu_avail')->default(0);
            $table->integer('cpu_error')->default(0);
            $table->integer('mem_avail')->default(0);
            $table->integer('mem_error')->default(0);
            $table->integer('disk_st_reboot')->default(0);
            $table->integer('disk_st_error')->default(0);
            $table->integer('disk_us_reboot')->default(0);
            $table->integer('disk_us_error')->default(0);
            $table->integer('net_ping')->default(0);
            $table->integer('net_error')->default(0);

            $table->integer('status')->default(0);
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
        Schema::dropIfExists('pm_resources_checklists');
    }
};
