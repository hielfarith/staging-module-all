<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MasterTransTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_trans_type')->delete();
        
        \DB::table('master_trans_type')->insert(array (
            0 => 
            array (
                'code' => 'Debit',
                'created_at' => NULL,
                'desc' => 'Debit',
                'id' => 1,
                'is_active' => 1,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'code' => 'Credit',
                'created_at' => NULL,
                'desc' => 'Credit',
                'id' => 2,
                'is_active' => 1,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'code' => 'Claim',
                'created_at' => NULL,
                'desc' => 'Claim',
                'id' => 3,
                'is_active' => 1,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'code' => 'Others',
                'created_at' => NULL,
                'desc' => 'Others',
                'id' => 4,
                'is_active' => 1,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}