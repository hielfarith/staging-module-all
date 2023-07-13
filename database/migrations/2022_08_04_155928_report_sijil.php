<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_sijil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sijil_name')->nullable();
            $table->datetime('date')->nullable();
            $table->text('descriptions')->nullable();
            $table->string('signature_one')->nullable();
            $table->string('signature_two')->nullable();
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_sijil', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('sijil_name');
            $table->dropColumn('date');
            $table->dropColumn('descriptions');
            $table->dropColumn('signature_one');
            $table->dropColumn('signature_two');
        });
    }
};
