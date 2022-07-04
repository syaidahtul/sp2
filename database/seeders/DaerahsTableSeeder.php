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
                'kod' => '01',
                'nama' => 'Kota Kinabalu',
                'aktif' => true,
            ),
            1 => 
            array (
                'kod' => '02',
                'nama' => 'Sandakan',
                'aktif' => true,
            ),
            2 => 
            array (
                'kod' => '03',
                'nama' => 'Tawau',
                'aktif' => true,
            ),
            3 => 
            array (
                'kod' => '04',
                'nama' => 'Kudat',
                'aktif' => true,
            ),
            4 => 
            array (
                'kod' => '05',
                'nama' => 'Keningau',
                'aktif' => true,
            ),
            5 => 
            array (
                'kod' => '06',
                'nama' => 'Lahad Datu',
                'aktif' => true,
            ),
            6 => 
            array (
                'kod' => '07',
                'nama' => 'Penampang',
                'aktif' => true,
            ),
            7 => 
            array (
                'kod' => '08',
                'nama' => 'Semporna',
                'aktif' => true,
            ),
            8 => 
            array (
                'kod' => '09',
                'nama' => 'Tuaran',
                'aktif' => true,
            ),
            9 => 
            array (
                'kod' => '10',
                'nama' => 'Papar',
                'aktif' => true,
            ),
            10 => 
            array (
                'kod' => '11',
                'nama' => 'Beaufort',
                'aktif' => true,
            ),
            11 => 
            array (
                'kod' => '12',
                'nama' => 'Sipitang',
                'aktif' => true,
            ),
            12 => 
            array (
                'kod' => '13',
                'nama' => 'Kuala Penyu',
                'aktif' => true,
            ),
            13 => 
            array (
                'kod' => '14',
                'nama' => 'Kota Belud',
                'aktif' => true,
            ),
            14 => 
            array (
                'kod' => '15',
                'nama' => 'Ranau',
                'aktif' => true,
            ),
            15 => 
            array (
                'kod' => '16',
                'nama' => 'Kota Marudu',
                'aktif' => true,
            ),
            16 => 
            array (
                'kod' => '17',
                'nama' => 'Pitas',
                'aktif' => true,
            ),
            17 => 
            array (
                'kod' => '18',
                'nama' => 'Beluran',
                'aktif' => true,
            ),
            18 => 
            array (
                'kod' => '19',
                'nama' => 'Kinabatangan',
                'aktif' => true,
            ),
            19 => 
            array (
                'kod' => '20',
                'nama' => 'Kunak',
                'aktif' => true,
            ),
            20 => 
            array (
                'kod' => '21',
                'nama' => 'Tambunan',
                'aktif' => true,
            ),
            21 => 
            array (
                'kod' => '22',
                'nama' => 'Tenom',
                'aktif' => true,
            ),
            22 => 
            array (
                'kod' => '23',
                'nama' => 'Nabawan',
                'aktif' => true,
            ),
            23 => 
            array (
                'kod' => '24',
                'nama' => 'Tongod',
                'aktif' => true,
            ),
            24 => 
            array (
                'kod' => '25',
                'nama' => 'Putata',
                'aktif' => true,
            ),
        ));
        
        
    }
}