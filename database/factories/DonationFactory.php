<?php

namespace Database\Factories;

use App\Models\Donation;
use App\Models\User;
use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    protected $model = Donation::class;

    public function definition()
    {
        return [
            'id_user' => User::factory(), // Ini akan membuat user baru untuk setiap donation
            'id_campaign' => Campaign::factory(), // Ini akan membuat campaign baru untuk setiap donation
            'pesan' => $this->faker->sentence,
            'syarat_ketentuan' => $this->faker->boolean,
            'jasa_kirim' => $this->faker->optional()->word,
            'nomor_resi' => $this->faker->optional()->numberBetween(1000000000, 9999999999),
            'created_at' => now(),
            'updated_at' => now(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']), // Sesuaikan status sesuai kebutuhan
        ];
    }
}

