<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReportApplicationMasterStatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('report_application_master_status')->delete();
        
        \DB::table('report_application_master_status')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'issue',
                'name' => 'Selesai',
                'is_active' => 1,
                'created_at' => '2022-06-30 15:30:39',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'issue',
                'name' => 'Dalam Proses',
                'is_active' => 1,
                'created_at' => '2022-06-30 15:30:39',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'issue',
                'name' => 'Maklumbalas Pengguna',
                'is_active' => 1,
                'created_at' => '2022-06-30 15:30:39',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'type' => 'issue',
                'name' => 'CR - Change Request',
                'is_active' => 1,
                'created_at' => '2022-06-30 15:30:39',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'type' => 'issue',
                'name' => 'Tangguh',
                'is_active' => 1,
                'created_at' => '2022-06-30 15:30:39',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}