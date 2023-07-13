<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('projects')->delete();
        
        \DB::table('projects')->insert(array (
            0 => 
            array (
                'clients_id' => 1,
                'contract_no' => 'QT210000000040609',
                'created_at' => NULL,
            'description' => 'Perolehan Pembaharuan Lesen Perisian Dan Penyelenggaraan Sistem Cukai Perkhidmatan Ke Atas Perkhidmatan Digital (MySToDS)

Pautan : https://mystods.customs.gov.my/',
                'end_date' => '2024-04-17',
                'hd_api_url' => 'https://mystods-helpdesk.unijaya.com/api/get-ticket.php?key=6XZcByKX6WRAGZeBr7Pa5v',
                'id' => 1,
                'name' => 'MySToDS',
                'objective' => 'Objektif laporan ini adalah untuk makluman kepada pihak BTM, JKDM semua aduan yang telah disalurkan daripada pihak BTM kepada pihak Unijaya secara bulanan. 

Di dalam laporan ini juga pihak BTM boleh mengenalpasti ralat dan change request  yang telah diminta oleh pihak user MySToDS beserta status.',
                'project_cost' => '1922773.00',
                'project_id_ts' => 5,
                'sst_no' => 'LA220000000009693',
                'start_date' => '2022-04-18',
                'system_name' => 'mystods',
                'tender_no' => 'QT210000000040609',
                'updated_at' => '2022-08-03 17:03:35',
            ),
            1 => 
            array (
                'clients_id' => 2,
                'contract_no' => 'QT0000000016476',
                'created_at' => NULL,
            'description' => 'Tender Penyelenggaraan Perisian, Aplikasi dan Perkakasan Sistem Elctronic Trade Union Information System (e-TUIS) Jabatan Hal Ehwal Kesatuan Sekerja (JHEKS) Malaysia',
                'end_date' => '2024-10-31',
                'hd_api_url' => 'https://e-tuis.jheks.gov.my/helpdesk/api/get-ticket.php?key=6XZcByKX6WRAGZeBr7Pa5v',
                'id' => 2,
                'name' => 'e-TUIS',
                'objective' => 'Objektif pelaporan ini dibuat adalah untuk memaklumkan semua pembaikan yang telah dibuat hasil dari laporan Helpdesk yang diterima.',
                'project_cost' => '2999998.00',
                'project_id_ts' => 15,
                'sst_no' => 'LA210000000036607',
                'start_date' => '2021-11-01',
                'system_name' => 'etuis',
                'tender_no' => 'QT0000000016476',
                'updated_at' => '2022-08-01 20:19:14',
            ),
            2 => 
            array (
                'clients_id' => 3,
                'contract_no' => 'QT210000000023800',
                'created_at' => '2022-07-14 12:14:26',
            'description' => 'Tender penyelenggaraan sistem utama Jabatan Pendaftaran Pertubuhan Malaysia (eROSES)',
                'end_date' => '2024-09-14',
                'hd_api_url' => NULL,
                'id' => 4,
                'name' => 'eROSES',
                'objective' => 'Objektif pelaporan ini dibuat adalah untuk memaklumkan semua pembaikan yang telah dibuat hasil dari laporan Helpdesk yang diterima.',
                'project_cost' => '519357.60',
                'project_id_ts' => 14,
                'sst_no' => 'LA210000000032363',
                'start_date' => '2021-09-15',
                'system_name' => 'eROSES',
                'tender_no' => 'QT210000000023800',
                'updated_at' => '2022-08-11 10:23:13',
            ),
            3 => 
            array (
                'clients_id' => 4,
                'contract_no' => 'QT220000000006728',
                'created_at' => '2022-07-29 12:23:58',
                'description' => 'Perkhidmatan membangunkan sistem pengurusan penyelidikan',
                'end_date' => '2025-08-07',
                'hd_api_url' => NULL,
                'id' => 5,
                'name' => 'RMS',
                'objective' => NULL,
                'project_cost' => NULL,
                'project_id_ts' => 24,
                'sst_no' => 'LA220000000022926',
                'start_date' => '2022-07-08',
                'system_name' => 'ERMS',
                'tender_no' => 'QT220000000006728',
                'updated_at' => '2022-07-29 12:32:27',
            ),
        ));
        
        
    }
}