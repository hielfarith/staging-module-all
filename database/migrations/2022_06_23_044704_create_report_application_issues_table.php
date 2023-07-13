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
        Schema::create('report_application_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_application_id')->unsigned();
            $table->text('explanation')->nullable();
            $table->text('solution')->nullable();
            $table->datetime('date_issued')->nullable();
            $table->datetime('date_completed')->nullable();
            $table->string('duration_completed')->nullable();
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
        Schema::dropIfExists('report_application_issues');
    }
};
