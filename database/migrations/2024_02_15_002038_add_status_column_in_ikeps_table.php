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
        Schema::table('ikeps', function (Blueprint $table) {
            $table->after('tahun', function ($table) {
                $table->string('status');
                $table->string('disediakan_oleh')->nullable();
                $table->date('tarikh_disediakan')->nullable();
                $table->string('disahkan_oleh')->nullable();
                $table->date('tarikh_disahkan')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ikeps', function (Blueprint $table) {
            $table->dropColumn(['status', 'disediakan_oleh', 'tarikh_disediakan', 'disahkan_oleh', 'tarikh_disahkan']);
        });
    }
};
