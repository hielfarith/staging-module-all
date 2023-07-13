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
        Schema::create('cm_report_appendixes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cm_report_id')->unsigned();
            $table->foreign('cm_report_id')->references('id')->on('cm_reports');

            $table->text('issue_reported')->nullable();
            $table->string('issue_class')->nullable();
            $table->text('action')->nullable();
            $table->text('status')->nullable();
            $table->integer('completed')->default(0);

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
        Schema::dropIfExists('cm_report_appendixes');
    }
};
