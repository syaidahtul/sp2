<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PbtsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pbts')->delete();
        
        \DB::table('pbts')->insert(array (
            0 => 
            array (
                'kod' => 'DBKK',
                'nama_pbt' => 'Dewan Bandaraya Kota Kinabalu',
                'region' => 'Kota Kinabalu',
                'state' => 'SABAH'
            ),
            1 => 
            array (
                'kod' => 'LBK',
                'nama_pbt' => 'Lembaga Bandaran Kudat',
                'region' => 'Kudat',
                'state' => 'SABAH'
            ),
            2 => 
            array (
                'kod' => 'MDBFT',
                'nama_pbt' => 'Majlis Daerah Beaufort',
                'region' => 'Beaufort',
                'state' => 'SABAH'
            ),
            3 => 
            array (
                'kod' => 'MDBRN',
                'nama_pbt' => 'Majlis Daerah Beluran',
                'region' => 'Beluran',
                'state' => 'SABAH'
            ),
            4 => 
            array (
                'kod' => 'MDKB',
                'nama_pbt' => 'Majlis Daerah Kota Belud',
                'region' => 'Kota Belud',
                'state' => 'SABAH'
            ),
            5 => 
            array (
                'kod' => 'MDKBT',
                'nama_pbt' => 'Majlis Daerah Kinabatangan',
                'region' => 'Kinabatangan',
                'state' => 'SABAH'
            ),
            6 => 
            array (
                'kod' => 'MDKGU',
                'nama_pbt' => 'Majlis Daerah Keningau',
                'region' => 'Keningau',
                'state' => 'SABAH'
            ),
            7 => 
            array (
                'kod' => 'MDKM',
                'nama_pbt' => 'Majlis Daerah Kota Marudu',
                'region' => 'Kota Marudu',
                'state' => 'SABAH'
            ),
            8 => 
            array (
                'kod' => 'MDKNK',
                'nama_pbt' => 'Majlis Daerah Kunak',
                'region' => 'Kunak',
                'state' => 'SABAH'
            ),
            9 => 
            array (
                'kod' => 'MDKP',
                'nama_pbt' => 'Majlis Daerah Kuala Penyu',
                'region' => 'Kuala Penyu',
                'state' => 'SABAH'
            ),
            10 => 
            array (
                'kod' => 'MDLD',
                'nama_pbt' => 'Majlis Daerah Lahad Datu',
                'region' => 'Lahad Datu',
                'state' => 'SABAH'
            ),
            11 => 
            array (
                'kod' => 'MDNBW',
                'nama_pbt' => 'Majlis Daerah Nabawan',
                'region' => 'Nabawan',
                'state' => 'SABAH'
            ),
            12 => 
            array (
                'kod' => 'MDPG',
                'nama_pbt' => 'Majlis Daerah Penampang',
                'region' => 'Penampang',
                'state' => 'SABAH'
            ),
            13 => 
            array (
                'kod' => 'MDPPR',
                'nama_pbt' => 'Majlis Daerah Papar',
                'region' => 'Papar',
                'state' => 'SABAH'
            ),
            14 => 
            array (
                'kod' => 'MDPTN',
                'nama_pbt' => 'Majlis Daerah Putatan',
                'region' => 'Putatan',
                'state' => 'SABAH'
            ),
            15 => 
            array (
                'kod' => 'MDPTS',
                'nama_pbt' => 'Majlis Daerah Pitas',
                'region' => 'Pitas',
                'state' => 'SABAH'
            ),
            16 => 
            array (
                'kod' => 'MDRNU',
                'nama_pbt' => 'Majlis Daerah Ranau',
                'region' => 'Ranau',
                'state' => 'SABAH'
            ),
            17 => 
            array (
                'kod' => 'MDSP',
                'nama_pbt' => 'Majlis Daerah Semporna',
                'region' => 'Semporna',
                'state' => 'SABAH'
            ),
            18 => 
            array (
                'kod' => 'MDSPG',
                'nama_pbt' => 'Majlis Daerah Sipitang',
                'region' => 'Sipitang',
                'state' => 'SABAH'
            ),
            19 => 
            array (
                'kod' => 'MDTBN',
                'nama_pbt' => 'Majlis Daerah Tambunan',
                'region' => 'Tambunan',
                'state' => 'SABAH'
            ),
            20 => 
            array (
                'kod' => 'MDTGD',
                'nama_pbt' => 'Majlis Daerah Tongod',
                'region' => 'Tongod',
                'state' => 'SABAH'
            ),
            21 => 
            array (
                'kod' => 'MDTNM',
                'nama_pbt' => 'Majlis Daerah Tenom',
                'region' => 'Tenom',
                'state' => 'SABAH'
            ),
            22 => 
            array (
                'kod' => 'MDTRN',
                'nama_pbt' => 'Majlis Daerah Tuaran',
                'region' => 'Tuaran',
                'state' => 'SABAH'
            ),
            23 => 
            array (
                'kod' => 'MPS',
                'nama_pbt' => 'Majlis Perbandaran Sandakan',
                'region' => 'Sandakan',
                'state' => 'SABAH'
            ),
            24 => 
            array (
                'kod' => 'MPT',
                'nama_pbt' => 'Majlis Perbandaran Tawau',
                'region' => 'Tawau',
                'state' => 'SABAH'
            ),
            25 => 
            array (
                'kod' => 'KKTP',
                'nama_pbt' => 'Kementerian Kerajaan Tempatan Dan Perumahan',
                'region' => 'Kota Kinabalu',
                'state' => 'SABAH'
            ),
        ));
        
        
    }
}