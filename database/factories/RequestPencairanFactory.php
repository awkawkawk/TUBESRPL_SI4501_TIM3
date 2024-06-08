<?php

namespace Database\Factories;

use App\Models\RequestPencairan;
use App\Models\MoneyDonation;
use App\Models\MethodPayment;
use App\Models\TahapPencairan;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestPencairanFactory extends Factory
{
    protected $model = RequestPencairan::class;

    public function definition()
    {
        return [
            'id_money_donation' => MoneyDonation::factory(), // Ini akan membuat money donation baru untuk setiap request pencairan
            'status' => $this->faker->randomElement(['pending', 'approved']), // Sesuaikan status sesuai kebutuhan
            'nominal_terkumpul' => $this->faker->randomFloat(2, 100, 10000),
            'nominal_sisa' => $this->faker->randomFloat(2, 0, 10000),
            'id_tahap_pencairan' => TahapPencairan::factory(), // Ini akan membuat tahap pencairan baru untuk setiap request pencairan
            'id_method_payment' => MethodPayment::factory(), // Ini akan membuat method payment baru untuk setiap request pencairan
            'nama_pemilik' => $this->faker->name,
            'nomor_rekening' => $this->faker->bankAccountNumber,
            'pendukung' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

