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
        Schema::create('report_attendance_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('attendance_id')->unsigned();
            $table->foreign('attendance_id')->references('id')->on('report_attendances');
            $table->date('work_date');
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
        Schema::dropIfExists('report_attendance_details');
    }
};
