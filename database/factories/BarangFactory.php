<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_barang' => $this->faker->word,
            'stok_barang' => $this->faker->numberBetween(1, 100),
            'harga' => $this->faker->numberBetween(10000, 1000000),
            'kategori_id' => Kategori::inRandomOrder()->first()->id,
            // atau jika ingin lebih spesifik:
        ];
    }
}
