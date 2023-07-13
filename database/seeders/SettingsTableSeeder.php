<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->delete();

        \DB::table('settings')->insert(array(
            0 =>
            array(
                'id' => 1,
                'key' => 'system_name',
                'value' => 'ePromis',
                'created_at' => null,
                'updated_at' => '2022-07-09 00:09:16',
            ),
            1 =>
            array(
                'id' => 2,
                'key' => 'background_login_page',
                'value' => 'storage/settingspicture/bg.png',
                'created_at' => null,
                'updated_at' => '2022-07-08 18:42:20',
            ),
            2 =>
            array(
                'id' => 3,
                'key' => 'logo_header',
                'value' => 'storage/settingspicture/favicon.png',
                'created_at' => null,
                'updated_at' => '2022-07-09 00:00:16',
            ),
            3 =>
            array(
                'id' => 4,
                'key' => 'favicon',
                'value' => 'storage/settingspicture/favicon.png',
                'created_at' => null,
                'updated_at' => '2022-07-09 00:00:16',
            ),
            4 =>
            array(
                'id' => 5,
                'key' => 'copyright',
                'value' => '2022 © UnijayaReport',
                'created_at' => null,
                'updated_at' => '2022-07-09 00:09:16',
            ),
        ));
    }
}
