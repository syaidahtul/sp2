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
            ),
            1 => 
            array (
                'kod' => 'LBK',
                'nama_pbt' => 'Lembaga Bandaran Kudat',
            ),
            2 => 
            array (
                'kod' => 'MDBFT',
                'nama_pbt' => 'Majlis Daerah Beaufort',
            ),
            3 => 
            array (
                'kod' => 'MDBRN',
                'nama_pbt' => 'Majlis Daerah Beluran',
            ),
            4 => 
            array (
                'kod' => 'MDKB',
                'nama_pbt' => 'Majlis Daerah Kota Belud',
            ),
            5 => 
            array (
                'kod' => 'MDKBT',
                'nama_pbt' => 'Majlis Daerah Kinabatangan',
            ),
            6 => 
            array (
                'kod' => 'MDKGU',
                'nama_pbt' => 'Majlis Daerah Keningau',
            ),
            7 => 
            array (
                'kod' => 'MDKM',
                'nama_pbt' => 'Majlis Daerah Kota Marudu',
            ),
            8 => 
            array (
                'kod' => 'MDKNK',
                'nama_pbt' => 'Majlis Daerah Kunak',
            ),
            9 => 
            array (
                'kod' => 'MDKP',
                'nama_pbt' => 'Majlis Daerah Kuala Penyu',
            ),
            10 => 
            array (
                'kod' => 'MDLD',
                'nama_pbt' => 'Majlis Daerah Lahad Datu',
            ),
            11 => 
            array (
                'kod' => 'MDNBW',
                'nama_pbt' => 'Majlis Daerah Nabawan',
            ),
            12 => 
            array (
                'kod' => 'MDPG',
                'nama_pbt' => 'Majlis Daerah Penampang',
            ),
            13 => 
            array (
                'kod' => 'MDPPR',
                'nama_pbt' => 'Majlis Daerah Papar',
            ),
            14 => 
            array (
                'kod' => 'MDPTN',
                'nama_pbt' => 'Majlis Daerah Putatan',
            ),
            15 => 
            array (
                'kod' => 'MDPTS',
                'nama_pbt' => 'Majlis Daerah Pitas',
            ),
            16 => 
            array (
                'kod' => 'MDRNU',
                'nama_pbt' => 'Majlis Daerah Ranau',
            ),
            17 => 
            array (
                'kod' => 'MDSP',
                'nama_pbt' => 'Majlis Daerah Semporna',
            ),
            18 => 
            array (
                'kod' => 'MDSPG',
                'nama_pbt' => 'Majlis Daerah Sipitang',
            ),
            19 => 
            array (
                'kod' => 'MDTBN',
                'nama_pbt' => 'Majlis Daerah Tambunan',
            ),
            20 => 
            array (
                'kod' => 'MDTGD',
                'nama_pbt' => 'Majlis Daerah Tongod',
            ),
            21 => 
            array (
                'kod' => 'MDTNM',
                'nama_pbt' => 'Majlis Daerah Tenom',
            ),
            22 => 
            array (
                'kod' => 'MDTRN',
                'nama_pbt' => 'Majlis Daerah Tuaran',
            ),
            23 => 
            array (
                'kod' => 'MPS',
                'nama_pbt' => 'Majlis Perbandaran Sandakan',
            ),
            24 => 
            array (
                'kod' => 'MPT',
                'nama_pbt' => 'Majlis Perbandaran Tawau',
            ),
            25 => 
            array (
                'kod' => 'KKTP',
                'nama_pbt' => 'Kementerian Kerajaan Tempatan Dan Perumahan',
            ),
        ));
        
        
    }
}