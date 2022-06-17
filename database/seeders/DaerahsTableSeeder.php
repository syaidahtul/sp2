<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DaerahsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('daerahs')->delete();
        
        \DB::table('daerahs')->insert(array (
            0 => 
            array (
                'kod_daerah' => '01',
                'nama_daerah' => 'Kota Kinabalu',
                'active' => true,
            ),
            1 => 
            array (
                'kod_daerah' => '02',
                'nama_daerah' => 'Sandakan',
                'active' => true,
            ),
            2 => 
            array (
                'kod_daerah' => '03',
                'nama_daerah' => 'Tawau',
                'active' => true,
            ),
            3 => 
            array (
                'kod_daerah' => '04',
                'nama_daerah' => 'Kudat',
                'active' => true,
            ),
            4 => 
            array (
                'kod_daerah' => '05',
                'nama_daerah' => 'Keningau',
                'active' => true,
            ),
            5 => 
            array (
                'kod_daerah' => '06',
                'nama_daerah' => 'Lahad Datu',
                'active' => true,
            ),
            6 => 
            array (
                'kod_daerah' => '07',
                'nama_daerah' => 'Penampang',
                'active' => true,
            ),
            7 => 
            array (
                'kod_daerah' => '08',
                'nama_daerah' => 'Semporna',
                'active' => true,
            ),
            8 => 
            array (
                'kod_daerah' => '09',
                'nama_daerah' => 'Tuaran',
                'active' => true,
            ),
            9 => 
            array (
                'kod_daerah' => '10',
                'nama_daerah' => 'Papar',
                'active' => true,
            ),
            10 => 
            array (
                'kod_daerah' => '11',
                'nama_daerah' => 'Beaufort',
                'active' => true,
            ),
            11 => 
            array (
                'kod_daerah' => '12',
                'nama_daerah' => 'Sipitang',
                'active' => true,
            ),
            12 => 
            array (
                'kod_daerah' => '13',
                'nama_daerah' => 'Kuala Penyu',
                'active' => true,
            ),
            13 => 
            array (
                'kod_daerah' => '14',
                'nama_daerah' => 'Kota Belud',
                'active' => true,
            ),
            14 => 
            array (
                'kod_daerah' => '15',
                'nama_daerah' => 'Ranau',
                'active' => true,
            ),
            15 => 
            array (
                'kod_daerah' => '16',
                'nama_daerah' => 'Kota Marudu',
                'active' => true,
            ),
            16 => 
            array (
                'kod_daerah' => '17',
                'nama_daerah' => 'Pitas',
                'active' => true,
            ),
            17 => 
            array (
                'kod_daerah' => '18',
                'nama_daerah' => 'Beluran',
                'active' => true,
            ),
            18 => 
            array (
                'kod_daerah' => '19',
                'nama_daerah' => 'Kinabatangan',
                'active' => true,
            ),
            19 => 
            array (
                'kod_daerah' => '20',
                'nama_daerah' => 'Kunak',
                'active' => true,
            ),
            20 => 
            array (
                'kod_daerah' => '21',
                'nama_daerah' => 'Tambunan',
                'active' => true,
            ),
            21 => 
            array (
                'kod_daerah' => '22',
                'nama_daerah' => 'Tenom',
                'active' => true,
            ),
            22 => 
            array (
                'kod_daerah' => '23',
                'nama_daerah' => 'Nabawan',
                'active' => true,
            ),
            23 => 
            array (
                'kod_daerah' => '24',
                'nama_daerah' => 'Tongod',
                'active' => true,
            ),
            24 => 
            array (
                'kod_daerah' => '25',
                'nama_daerah' => 'Putata',
                'active' => true,
            ),
        ));
        
        
    }
}