<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectBudgetTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('project_budget')->delete();
        
        \DB::table('project_budget')->insert(array (
            0 => 
            array (
                'base_price' => '67510.80',
                'best_case' => '14000.00',
                'contigency' => '8037.00',
                'created_at' => '2022-08-23 14:02:14',
                'id' => 1,
                'item_name' => 'PEMBAHARUAN LESEN PERISIAN CHATTING',
                'on_par' => '14000.00',
                'project_id' => 1,
                'tax' => '4822.20',
                'tender_price' => '80370.00',
                'updated_at' => '2022-08-23 14:02:14',
                'worst_case' => '14000.00',
            ),
            1 => 
            array (
                'base_price' => '1555.51',
                'best_case' => '1800.00',
                'contigency' => '185.18',
                'created_at' => '2022-08-23 14:02:14',
                'id' => 2,
                'item_name' => 'PEMBAHARUAN PERISIAN ANTIVIRUS',
                'on_par' => '1800.00',
                'project_id' => 1,
                'tax' => '111.11',
                'tender_price' => '1851.80',
                'updated_at' => '2022-08-23 14:02:14',
                'worst_case' => '1800.00',
            ),
            2 => 
            array (
                'base_price' => '1423451.40',
                'best_case' => '596987.50',
                'contigency' => '169458.50',
                'created_at' => '2022-08-23 14:02:14',
                'id' => 3,
                'item_name' => 'KHIDMAT SOKONGAN BULANAN APLIKASI MySToDS',
                'on_par' => '686535.63',
                'project_id' => 1,
                'tax' => '101675.10',
                'tender_price' => '1694585.00',
                'updated_at' => '2022-08-23 14:02:14',
                'worst_case' => '805933.13',
            ),
            3 => 
            array (
                'base_price' => '31189.20',
                'best_case' => '30800.00',
                'contigency' => '3713.00',
                'created_at' => '2022-08-23 14:02:14',
                'id' => 4,
                'item_name' => 'LATIHAN',
                'on_par' => '35420.00',
                'project_id' => 1,
                'tax' => '2227.80',
                'tender_price' => '37130.00',
                'updated_at' => '2022-08-23 14:02:14',
                'worst_case' => '37576.00',
            ),
            4 => 
            array (
                'base_price' => '210000.00',
                'best_case' => '79800.00',
                'contigency' => '25000.00',
                'created_at' => '2022-08-23 14:03:37',
                'id' => 16,
            'item_name' => 'Perkhidmatan Pembangunan Sub-Sistem Portal Single Sign On Melalui Sistem Pengurusan ID (SPID) di bawah RMS',
                'on_par' => '105000.00',
                'project_id' => 5,
                'tax' => '15000.00',
                'tender_price' => '250000.00',
                'updated_at' => '2022-08-23 14:03:37',
                'worst_case' => '121800.00',
            ),
            5 => 
            array (
                'base_price' => '264600.00',
                'best_case' => '100548.00',
                'contigency' => '31500.00',
                'created_at' => '2022-08-23 14:03:37',
                'id' => 17,
            'item_name' => 'Perkhidmatan Pembangunan Subsistem Education Policy Studies (EPS) di bawah RMS',
                'on_par' => '132300.00',
                'project_id' => 5,
                'tax' => '18900.00',
                'tender_price' => '315000.00',
                'updated_at' => '2022-08-23 14:03:37',
                'worst_case' => '153468.00',
            ),
            6 => 
            array (
                'base_price' => '273000.00',
                'best_case' => '103740.00',
                'contigency' => '32500.00',
                'created_at' => '2022-08-23 14:03:37',
                'id' => 18,
            'item_name' => 'Perkhidmatan Pembangunan SubSistem Geran Kerjasama Industri dan Pihak Luar (IPL) di bawah RMS.',
                'on_par' => '136500.00',
                'project_id' => 5,
                'tax' => '19500.00',
                'tender_price' => '325000.00',
                'updated_at' => '2022-08-23 14:03:37',
                'worst_case' => '158340.00',
            ),
            7 => 
            array (
                'base_price' => '231000.00',
                'best_case' => '87780.00',
                'contigency' => '27500.00',
                'created_at' => '2022-08-23 14:03:37',
                'id' => 19,
                'item_name' => 'Perkhidmatan Pembangunan Repositori di bawah RMS',
                'on_par' => '115500.00',
                'project_id' => 5,
                'tax' => '16500.00',
                'tender_price' => '275000.00',
                'updated_at' => '2022-08-23 14:03:37',
                'worst_case' => '133980.00',
            ),
            8 => 
            array (
                'base_price' => '225120.00',
                'best_case' => '85545.60',
                'contigency' => '26800.00',
                'created_at' => '2022-08-23 14:03:37',
                'id' => 20,
                'item_name' => 'Perkhidmatan Pembangunan Dashboard di bawah RMS',
                'on_par' => '112560.00',
                'project_id' => 5,
                'tax' => '16080.00',
                'tender_price' => '268000.00',
                'updated_at' => '2022-08-23 14:03:37',
                'worst_case' => '130569.00',
            ),
            9 => 
            array (
                'base_price' => '325920.00',
                'best_case' => '123849.60',
                'contigency' => '38800.00',
                'created_at' => '2022-08-23 14:03:37',
                'id' => 21,
                'item_name' => 'Perkhidmatan Pembangunan Pengintegrasian di bawah RMS',
                'on_par' => '162960.00',
                'project_id' => 5,
                'tax' => '23280.00',
                'tender_price' => '388000.00',
                'updated_at' => '2022-08-23 14:03:37',
                'worst_case' => '189033.60',
            ),
            10 => 
            array (
                'base_price' => '788760.00',
                'best_case' => '728892.00',
                'contigency' => '93900.00',
                'created_at' => '2022-08-23 14:03:37',
                'id' => 22,
                'item_name' => 'Perisian',
                'on_par' => '758826.00',
                'project_id' => 5,
                'tax' => '56340.00',
                'tender_price' => '939000.00',
                'updated_at' => '2022-08-23 14:03:37',
                'worst_case' => '788760.00',
            ),
            11 => 
            array (
                'base_price' => '168000.00',
                'best_case' => '100800.00',
                'contigency' => '20000.00',
                'created_at' => '2022-08-23 14:03:37',
                'id' => 23,
                'item_name' => 'Migrasi SyRI',
                'on_par' => '117600.00',
                'project_id' => 5,
                'tax' => '12000.00',
                'tender_price' => '200000.00',
                'updated_at' => '2022-08-23 14:03:37',
                'worst_case' => '109200.00',
            ),
            12 => 
            array (
                'base_price' => '222600.00',
                'best_case' => '133560.00',
                'contigency' => '26500.00',
                'created_at' => '2022-08-23 14:03:37',
                'id' => 24,
                'item_name' => 'Perkhidmatan Pengujian RMS',
                'on_par' => '155830.00',
                'project_id' => 5,
                'tax' => '15900.00',
                'tender_price' => '265000.00',
                'updated_at' => '2022-08-23 14:03:37',
                'worst_case' => '144690.00',
            ),
            13 => 
            array (
                'base_price' => '168000.00',
                'best_case' => '100800.00',
                'contigency' => '20000.00',
                'created_at' => '2022-08-23 14:03:37',
                'id' => 25,
                'item_name' => 'Dokumentasi dan Pengurusan Projek',
                'on_par' => '117600.00',
                'project_id' => 5,
                'tax' => '12000.00',
                'tender_price' => '200000.00',
                'updated_at' => '2022-08-23 14:03:37',
                'worst_case' => '126000.00',
            ),
            14 => 
            array (
                'base_price' => '145320.00',
                'best_case' => '111343.76',
                'contigency' => '17300.00',
                'created_at' => '2022-08-23 14:03:37',
                'id' => 26,
                'item_name' => 'Perkhidmatan Latihan',
                'on_par' => '130526.00',
                'project_id' => 5,
                'tax' => '10380.00',
                'tender_price' => '173000.00',
                'updated_at' => '2022-08-23 14:03:37',
                'worst_case' => '143314.16',
            ),
        ));
        
        
    }
}