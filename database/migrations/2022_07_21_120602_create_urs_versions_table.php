<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrsVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urs_versions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('urs_id')->index('urs_versions_FK_urs');
            $table->string('ver_no')->nullable();
            $table->date('ver_date')->nullable();
            $table->string('ver_remark')->nullable();
            $table->string('ver_prepared_by')->nullable();
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
        Schema::dropIfExists('urs_versions');
    }
}
