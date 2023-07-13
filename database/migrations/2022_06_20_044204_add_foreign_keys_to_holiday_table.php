<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHolidayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('holiday', function (Blueprint $table) {
            $table->foreign(['created_by_user_id'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['holiday_type_id'])->references(['id'])->on('master_holiday_type')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('holiday', function (Blueprint $table) {
            $table->dropForeign('holiday_created_by_user_id_foreign');
            $table->dropForeign('holiday_holiday_type_id_foreign');
        });
    }
}
