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
        Schema::table('timeline', function (Blueprint $table) {
            $table->string('signee')->nullable()->after('status');
            $table->date('actual_start_date')->nullable()->after('end_date');
            $table->date('actual_end_date')->nullable()->after('actual_start_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timeline', function (Blueprint $table) {
            $table->dropColumn('signee');
            $table->dropColumn('actual_start_date');
            $table->dropColumn('actual_end_date');
        });
    }
};
