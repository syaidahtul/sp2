<?php

namespace Database\Factories;

use App\Models\Lokasi;
use Illuminate\Database\Eloquent\Factories\Factory;

class LokasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lokasi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_lokasi' => $this->faker->company(),
            'kod_pbt'=> $this->faker->randomElement(['KKTP','DBKK','MDLD','MDPPR','MDPTN','MDPTS']),
            'kod_jenis_operasi' => $this->faker->randomElement(['PARIT','RUMPUT','SAMPAH']),
            'kod_jenis_kawasan' => $this->faker->randomElement(['KOMERSIAL','PERUMAHAN']),
        ];
    }
}
