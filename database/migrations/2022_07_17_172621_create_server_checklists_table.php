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
        Schema::create('pm_server_checklists', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('type')->default(0);

            $table->bigInteger('server_ip_id')->unsigned();
            $table->foreign('server_ip_id')->references('id')->on('pm_server_ips');

            $table->bigInteger('checklist_id')->unsigned();
            $table->foreign('checklist_id')->references('id')->on('pm_checklist');

            $table->integer('system_boot_reboot')->default(0);
            $table->integer('system_boot_error')->default(0);

            $table->integer('os_reboot')->default(0);
            $table->integer('os_error')->default(0);

            $table->integer('firewall_harden')->default(0);

            $table->integer('password_harden')->default(0);

            $table->integer('service_reboot')->default(0);
            $table->integer('service_error')->default(0);

            $table->integer('clean_log')->default(0);
            $table->integer('clean_cache')->default(0);

            $table->integer('app_us_reboot')->default(0);
            $table->integer('app_us_error')->default(0);

            $table->integer('app_up_reboot')->default(0);
            $table->integer('app_up_error')->default(0);

            $table->integer('app_backup')->default(0);

            $table->integer('hardware_status')->default(0);
            $table->integer('admin_tool_status')->default(0);
            $table->integer('resources_status')->default(0);

            $table->integer('count')->default(12);
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
        Schema::dropIfExists('pm_server_checklists');
    }
};
