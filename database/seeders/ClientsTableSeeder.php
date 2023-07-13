<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('clients')->delete();

        \DB::table('clients')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'JABATAN KASTAM DIRAJA MALAYSIA',
                'name_short' => 'JKDM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'KEMENTERIAN SUMBER MANUSIA',
                'name_short' => 'KSM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'KEMENTERIAN DALAM NEGERI',
                'name_short' => 'KDN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'KEMENTERIAN PENGAJIAN TINGGI',
                'name_short' => 'KPT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
