<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MoneyDonation;

class MoneyDonationsTableSeeder extends Seeder
{
    public function run()
    {
        MoneyDonation::factory()->count(50)->create(); // Sesuaikan jumlah data dummy yang diinginkan
    }
}

