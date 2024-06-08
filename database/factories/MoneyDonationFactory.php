<?php

namespace Database\Factories;

use App\Models\MoneyDonation;
use App\Models\MethodPayment;
use Illuminate\Database\Eloquent\Factories\Factory;

class MoneyDonationFactory extends Factory
{
    protected $model = MoneyDonation::class;

    public function definition()
    {
        return [
            'id_donasi' => $this->faker->unique()->numberBetween(1, 50), // Sesuaikan dengan jumlah data seeder pada tabel Donations
            'id_bank' => MethodPayment::factory(), // Ini akan membuat method payment baru untuk setiap money donation
            'nama_bank' => $this->faker->company,
            'nama_pemilik' => $this->faker->name,
            'nomor_rekening' => $this->faker->bankAccountNumber,
            'nominal' => $this->faker->randomFloat(2, 100, 10000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

