<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MasterMediumTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_medium')->delete();
        
        \DB::table('master_medium')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Helpdesk',
                'created_at' => '2022-07-07 10:55:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Hotline',
                'created_at' => '2022-07-07 10:55:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Email',
                'created_at' => '2022-07-07 10:55:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Whatsapp',
                'created_at' => '2022-07-07 10:55:00',
            ),
        ));
        
        
    }
}