<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JenisOperasisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jenis_operasis')->delete();
        
        \DB::table('jenis_operasis')->insert(array (
            0 => 
            array (
                'kod' => 'PARIT',
                'keterangan' => 'Pembersihan Parit',
                'active' => true,
            ),
            1 => 
            array (
                'kod' => 'RUMPUT',
                'keterangan' => 'Pemotongan Rumput',
                'active' => true,
            ),
            2 => 
            array (
                'kod' => 'SAMPAH',
                'keterangan' => 'Kutipan Sampah',
                'active' => true,
            ),
        ));
        
        
    }
}