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
        Schema::create('report_helpdesk_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_helpdesk_id')->unsigned();
            $table->integer('master_medium_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('explanation')->nullable();
            $table->string('category')->nullable();
            $table->datetime('date_issued')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('report_helpdesk_issues');
    }
};
