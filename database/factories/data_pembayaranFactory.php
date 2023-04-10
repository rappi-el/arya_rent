<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\data_booking>
 */
class data_pembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $fillable = [
        '',
        '',
        '', 
    ];
    public function definition()
    {
        return [
            'data_booking_id' => 1,
            'metode_pembayaran' => "dana",
            'status_pembayaran' => "belum di bayar",
        ];
    }
}
