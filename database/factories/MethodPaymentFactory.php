<?php

namespace Database\Factories;

use App\Models\MethodPayment;
use Illuminate\Database\Eloquent\Factories\Factory;

class MethodPaymentFactory extends Factory
{
    protected $model = MethodPayment::class;

    public function definition()
    {
        return [
            'metode_pembayaran' => $this->faker->word,
            'nomor_rekening' => $this->faker->bankAccountNumber,
            'nama_pemilik' => $this->faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
    
