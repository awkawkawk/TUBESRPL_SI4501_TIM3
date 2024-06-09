<?php

namespace Database\Factories;

use App\Models\MoneyDonation;
use App\Models\Donation;
use App\Models\MethodPayment;
use Illuminate\Database\Eloquent\Factories\Factory;

class MoneyDonationFactory extends Factory
{
    protected $model = MoneyDonation::class;

    public function definition()
    {
        return [
            'id_donasi' => Donation::factory(),
            'id_bank' => MethodPayment::factory(),
            'nama_bank' => $this->faker->company,
            'nama_pemilik' => $this->faker->name,
            'nomor_rekening' => $this->faker->unique()->bankAccountNumber,
            'nominal' => $this->faker->randomFloat(2, 100, 10000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}


