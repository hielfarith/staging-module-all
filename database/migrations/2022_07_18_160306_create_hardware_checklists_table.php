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
        Schema::create('pm_hardware_checklists', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('server_checklist_id')->unsigned();
            $table->foreign('server_checklist_id')->references('id')->on('pm_server_checklists');

            $table->integer('fan_reboot')->default(0);
            $table->integer('fan_error')->default(0);
            $table->integer('psu_reboot')->default(0);
            $table->integer('psu_error')->default(0);
            $table->integer('cable_reboot')->default(0);
            $table->integer('cable_error')->default(0);

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
        Schema::dropIfExists('pm_hardware_checklists');
    }
};
