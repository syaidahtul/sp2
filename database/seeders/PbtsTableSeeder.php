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
                'active' => true,
            ),
            1 => 
            array (
                'kod' => 'LBK',
                'nama_pbt' => 'Lembaga Bandaran Kudat',
                'active' => true,
            ),
            2 => 
            array (
                'kod' => 'MDBFT',
                'nama_pbt' => 'Majlis Daerah Beaufort',
                'active' => true,
            ),
            3 => 
            array (
                'kod' => 'MDBRN',
                'nama_pbt' => 'Majlis Daerah Beluran',
                'active' => true,
            ),
            4 => 
            array (
                'kod' => 'MDKB',
                'nama_pbt' => 'Majlis Daerah Kota Belud',
                'active' => true,
            ),
            5 => 
            array (
                'kod' => 'MDKBT',
                'nama_pbt' => 'Majlis Daerah Kinabatangan',
                'active' => true,
            ),
            6 => 
            array (
                'kod' => 'MDKGU',
                'nama_pbt' => 'Majlis Daerah Keningau',
                'active' => true,
            ),
            7 => 
            array (
                'kod' => 'MDKM',
                'nama_pbt' => 'Majlis Daerah Kota Marudu',
                'active' => true,
            ),
            8 => 
            array (
                'kod' => 'MDKNK',
                'nama_pbt' => 'Majlis Daerah Kunak',
                'active' => true,
            ),
            9 => 
            array (
                'kod' => 'MDKP',
                'nama_pbt' => 'Majlis Daerah Kuala Penyu',
                'active' => true,
            ),
            10 => 
            array (
                'kod' => 'MDLD',
                'nama_pbt' => 'Majlis Daerah Lahad Datu',
                'active' => true,
            ),
            11 => 
            array (
                'kod' => 'MDNBW',
                'nama_pbt' => 'Majlis Daerah Nabawan',
                'active' => true,
            ),
            12 => 
            array (
                'kod' => 'MDPG',
                'nama_pbt' => 'Majlis Daerah Penampang',
                'active' => true,
            ),
            13 => 
            array (
                'kod' => 'MDPPR',
                'nama_pbt' => 'Majlis Daerah Papar',
                'active' => true,
            ),
            14 => 
            array (
                'kod' => 'MDPTN',
                'nama_pbt' => 'Majlis Daerah Putatan',
                'active' => true,
            ),
            15 => 
            array (
                'kod' => 'MDPTS',
                'nama_pbt' => 'Majlis Daerah Pitas',
                'active' => true,
            ),
            16 => 
            array (
                'kod' => 'MDRNU',
                'nama_pbt' => 'Majlis Daerah Ranau',
                'active' => true,
            ),
            17 => 
            array (
                'kod' => 'MDSP',
                'nama_pbt' => 'Majlis Daerah Semporna',
                'active' => true,
            ),
            18 => 
            array (
                'kod' => 'MDSPG',
                'nama_pbt' => 'Majlis Daerah Sipitang',
                'active' => true,
            ),
            19 => 
            array (
                'kod' => 'MDTBN',
                'nama_pbt' => 'Majlis Daerah Tambunan',
                'active' => true,
            ),
            20 => 
            array (
                'kod' => 'MDTGD',
                'nama_pbt' => 'Majlis Daerah Tongod',
                'active' => true,
            ),
            21 => 
            array (
                'kod' => 'MDTNM',
                'nama_pbt' => 'Majlis Daerah Tenom',
                'active' => true,
            ),
            22 => 
            array (
                'kod' => 'MDTRN',
                'nama_pbt' => 'Majlis Daerah Tuaran',
                'active' => true,
            ),
            23 => 
            array (
                'kod' => 'MPS',
                'nama_pbt' => 'Majlis Perbandaran Sandakan',
                'active' => true,
            ),
            24 => 
            array (
                'kod' => 'MPT',
                'nama_pbt' => 'Majlis Perbandaran Tawau',
                'active' => true,
            ),
            25 => 
            array (
                'kod' => 'KKTP',
                'nama_pbt' => 'Kementerian Kerajaan Tempatan Dan Perumahan',
                'active' => true,
            ),
        ));
        
        
    }
}