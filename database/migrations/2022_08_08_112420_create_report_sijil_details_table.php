<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use MigrationsGenerator\Generators\MigrationConstants\Method\Foreign;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_sijil_details', function (Blueprint $table) {
            $table ->id();
            $table ->unsignedBigInteger('report_sijil_id');
            $table ->string('Firstname')->nullable();
            $table ->string('Secondname')->nullable();
            $table ->timestamps();
            $table ->foreign('report_sijil_id')
                ->references('id')->on('report_sijil')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_sijil_details');
    }
};
