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
        Schema::table('pengerusi_pengetua_gurus', function (Blueprint $table) {
            $table->string('sebab_pertukaran')->nullable()->change();
            $table->string('status')->default('Telah Disahkan')->after('sebab_pertukaran_lain');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengerusi_pengetua_gurus', function (Blueprint $table) {
            $table->string('sebab_pertukaran')->nullable(false)->change();
            $table->dropColumn('status');
        });
    }
};
