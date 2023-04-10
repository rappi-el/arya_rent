<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\data_booking>
 */
class data_bookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

 
    public function definition()
    {
        return [
            'data_mobil_id' => 1,
            'email' => "irvan9110@gmail.com",
            'total_harga' => 150000,
            'phone' => "085156540536", // password
            'tanggal_booking' => now(),
            'tanggal_kembali' => now(),
        ];
    }
}
