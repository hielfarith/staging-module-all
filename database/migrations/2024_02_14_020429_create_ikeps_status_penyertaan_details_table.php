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
        Schema::create('ikeps_status_penyertaan_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ikeps_id');
            $table->string('name');
            $table->string('type');
            $table->json('details');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('ikeps_status_penyertaan_details');
    }
};
