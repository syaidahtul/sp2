<?php

namespace Database\Factories;

use App\Models\JenisOperasi;
use App\Models\Lokasi;
use App\Models\Pbt;
use Illuminate\Database\Eloquent\Factories\Factory;

class OperasiPbtFactory extends Factory
{
    public function definition()
    {
        return [
            'kod_pbt' => 'DBKK',
            'lokasi_id' => Lokasi::all()->random(),
            'jenis_operasi' => JenisOperasi::all()->random(),
            'tarikh_operasi_mula' => $this->faker->dateTimeThisYear('now', 'Asia/Kuala_Lumpur'),
            'tarikh_operasi_tamat' => $this->faker->dateTimeThisYear('now', 'Asia/Kuala_Lumpur')
        ];
    }
}
