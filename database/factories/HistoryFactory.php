<?php

namespace Database\Factories;

use App\Models\History;
use App\Models\MoneyDonation;
use App\Models\TahapPencairan;
use App\Models\MethodPayment;
use App\Models\RequestPencairan;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoryFactory extends Factory
{
    protected $model = History::class;

    public function definition()
    {
        return [
            'id_money_donation' => MoneyDonation::factory(), // Ini akan membuat money donation baru untuk setiap history
            'status' => $this->faker->randomElement(['pending', 'approved']), // Sesuaikan status sesuai kebutuhan
            'nominal_pencairan' => $this->faker->randomFloat(2, 100, 10000),
            'id_tahap_pencairan' => TahapPencairan::factory(), // Ini akan membuat tahap pencairan baru untuk setiap history
            'id_method_payment' => MethodPayment::factory(), // Ini akan membuat method payment baru untuk setiap history
            'id_request_pencairan' => RequestPencairan::factory(), // Ini akan membuat request pencairan baru untuk setiap history
            'nama_pemilik' => $this->faker->name,
            'nomor_rekening' => $this->faker->bankAccountNumber,
            'pendukung' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
