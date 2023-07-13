<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
            array (
                'created_at' => '2022-03-23 11:49:33',
                'description' => 'Internal User with full permission and privilege',
                'guard_name' => 'web',
                'is_internal' => 1,
                'id' => 1,
                'name' => 'superadmin',
                'display_name' => 'superadmin',
                'updated_at' => '2022-03-23 11:49:36',
            ),
            1 =>
            array (
                'created_at' => '2022-03-23 11:49:33',
                'description' => 'Internal User with medium level privilege and permission',
                'guard_name' => 'web',
                'is_internal' => 1,
                'id' => 2,
                'name' => 'admin',
                'display_name' => 'admin',
                'updated_at' => '2022-03-24 06:22:07',
            ),
            2 =>
            array (
                'created_at' => '2022-04-07 09:47:10',
                'description' => 'External User with basic permission',
                'guard_name' => 'web',
                'is_internal' => 0,
                'id' => 3,
                'name' => 'pengguna_luar',
                'display_name' => 'pengguna_luar',
                'updated_at' => '2022-04-07 09:47:10',
            ),
            3 =>
            array (
                'created_at' => '2022-04-07 09:47:10',
                'description' => 'External User with basic permission',
                'guard_name' => 'web',
                'is_internal' => 0,
                'id' => 4,
                'name' => 'pengguna_luar_1',
                'display_name' => 'pengguna_luar_1',
                'updated_at' => '2022-04-07 09:47:10',
            ),
            4 =>
            array (
                'created_at' => '2022-04-07 09:47:10',
                'description' => 'External User with basic permission',
                'guard_name' => 'web',
                'is_internal' => 0,
                'id' => 5,
                'name' => 'pengguna_luar_2',
                'display_name' => 'pengguna_luar_2',
                'updated_at' => '2022-04-07 09:47:10',
            ),
            5 =>
            array (
                'created_at' => '2022-09-27 18:17:12',
                'description' => 'Isi Permohonan',
                'guard_name' => 'web',
                'is_internal' => 0,
                'id' => 6,
                'name' => '[Test_Module]_Pengguna_Luar_1',
                'display_name' => '[Test_Module]_Pengguna_Luar_1',
                'updated_at' => '2022-09-27 18:17:12',
            ),
            6 =>
            array (
                'created_at' => '2022-09-27 18:17:32',
                'description' => 'Isi Deklarasi',
                'guard_name' => 'web',
                'is_internal' => 0,
                'id' => 7,
                'name' => '[Test_Module]_Pengguna_Luar_2',
                'display_name' => '[Test_Module]_Pengguna_Luar_2',
                'updated_at' => '2022-09-27 18:17:32',
            ),
            7 =>
            array (
                'created_at' => '2022-09-27 18:18:05',
                'description' => 'Lulus Permohonan',
                'guard_name' => 'web',
                'is_internal' => 1,
                'id' => 8,
                'name' => '[Test_Module]_Admin',
                'display_name' => '[Test_Module]_Admin',
                'updated_at' => '2022-09-27 18:18:05',
            ),
            8 =>
            array (
                'created_at' => '2022-09-28 15:15:40',
                'description' => 'random',
                'guard_name' => 'web',
                'is_internal' => 1,
                'id' => 9,
                'name' => 'random',
                'display_name' => 'random',
                'updated_at' => '2022-09-28 15:15:40',
            ),
        ));


    }
}
