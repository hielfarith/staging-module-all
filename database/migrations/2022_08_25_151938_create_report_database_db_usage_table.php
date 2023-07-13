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
        Schema::create('report_database_db_usage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('report_database_id')->constrained('report_database')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tableName')->nullable();
            $table->integer('tableRow')->nullable();
            $table->integer('tableSize')->nullable();
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
        Schema::dropIfExists('report_database_db_usage');
    }
};
