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
        Schema::create('pm_server_checklist_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('server_checklist_id')->unsigned();
            $table->foreign('server_checklist_id')->references('id')->on('pm_server_checklists');
            $table->string('type')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('pm_server_checklist_notes');
    }
};
