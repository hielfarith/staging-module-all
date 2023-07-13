<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHolidayStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('holiday_state', function (Blueprint $table) {
            $table->foreign(['holiday_id'])->references(['id'])->on('holiday')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['state_id'])->references(['id'])->on('master_state')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('holiday_state', function (Blueprint $table) {
            $table->dropForeign('holiday_state_holiday_id_foreign');
            $table->dropForeign('holiday_state_state_id_foreign');
        });
    }
}
