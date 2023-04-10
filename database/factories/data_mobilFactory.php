<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\data_mobil>
 */
class data_mobilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        return [
            'nama_mobil' => fake()->name(),
            'kapasitas_mobil' => 6,
            'transmisi_mobil' => 1,
            'harga_mobil' => 150000, // password
            'status_mobil' => 0,
        ];
    }
}
