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
        Schema::create('pm_project_servers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('pm_setting_id')->unsigned();
            $table->foreign('pm_setting_id')->references('id')->on('pm_settings');

            $table->integer('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');

            $table->bigInteger('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('pm_server_address');

            $table->text('server_name')->nullable();

            $table->string('server_brand')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('cpu')->nullable();
            $table->string('memory')->nullable();
            $table->string('hdd')->nullable();
            $table->string('tape_drive')->nullable();
            $table->string('graphic_io')->nullable();
            $table->string('power_supply')->nullable();
            $table->string('other_io')->nullable();
            $table->string('server_os')->nullable();
            $table->string('server_kernal')->nullable();
            $table->string('server_patches')->nullable();
            $table->string('server_gateway')->nullable();
            $table->string('server_dns')->nullable();
            $table->string('ip_address_info')->nullable();
            $table->string('server_hostname')->nullable();

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
        Schema::dropIfExists('pm_project_servers');
    }
};
