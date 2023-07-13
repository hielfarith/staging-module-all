<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAnnouncementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('announcement', function (Blueprint $table) {
            $table->foreign(['announcement_type_id'])->references(['id'])->on('master_announcement_type')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['created_by_user_id'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('announcement', function (Blueprint $table) {
            $table->dropForeign('announcement_announcement_type_id_foreign');
            $table->dropForeign('announcement_created_by_user_id_foreign');
        });
    }
}
