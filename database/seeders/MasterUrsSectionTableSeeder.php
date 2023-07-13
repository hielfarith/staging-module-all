<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MasterUrsSectionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_urs_section')->delete();
        
        \DB::table('master_urs_section')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => NULL,
                'section_seq' => 1,
                'section_name' => '1. PENGENALAN',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'section_seq' => 2,
                'section_name' => '2. KEPERLUAN PENGURUSAN BISNES',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => NULL,
                'section_seq' => 3,
                'section_name' => '3. KEPERLUAN PENGOPERASIAN BISNES',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 1,
                'section_seq' => 1,
                'section_name' => '1.1 Tujuan Bisnes',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 1,
                'section_seq' => 2,
                'section_name' => '1.2 Skop Bisnes',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 1,
                'section_seq' => 3,
                'section_name' => '1.3 Gambaran Keseluruhan Bisnes',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 1,
                'section_seq' => 4,
                'section_name' => '1.4 Senarai Pemegang Taruh',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 2,
                'section_seq' => 1,
                'section_name' => '2.1 Matlamat dan Objektif',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => 2,
                'section_seq' => 2,
                'section_name' => '2.2 Arkitektur Bisnes',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'parent_id' => 2,
                'section_seq' => 3,
                'section_name' => '2.3 Arkitektur Maklumat',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'parent_id' => 3,
                'section_seq' => 1,
                'section_name' => '3.1 Keperluan Fungsi Bisnes',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'parent_id' => 3,
                'section_seq' => 2,
                'section_name' => '3.2 Keperluan Proses Bisnes',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 14,
                'parent_id' => 11,
                'section_seq' => 1,
                'section_name' => '3.1.1 Penggunaan Notasi',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 15,
                'parent_id' => 11,
                'section_seq' => 2,
                'section_name' => '3.1.2 Model Fungsi Bisnes',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 16,
                'parent_id' => 11,
                'section_seq' => 3,
                'section_name' => '3.1.3 Senarai Pengguna',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 17,
                'parent_id' => 12,
                'section_seq' => 1,
                'section_name' => '3.2.1 Penggunaa Notasi',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 18,
                'parent_id' => 12,
                'section_seq' => 2,
                'section_name' => '3.2.2 Model dan Definisi Proses Bisnes',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}