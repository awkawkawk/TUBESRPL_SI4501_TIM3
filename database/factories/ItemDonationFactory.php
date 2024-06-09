<?php

namespace Database\Factories;

use App\Models\ItemDonation;
use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemDonationFactory extends Factory
{
    protected $model = ItemDonation::class;

    public function definition()
    {
        return [
            'id_donasi' => Donation::factory(), // Ini akan membuat donation baru untuk setiap item donation
            'nama_barang' => $this->faker->word,
            'jumlah_barang' => $this->faker->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

