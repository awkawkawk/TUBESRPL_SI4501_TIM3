<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MethodPayment;

class MethodPaymentsTableSeeder extends Seeder
{
    public function run()
    {
        MethodPayment::factory()->count(10)->create(); // Sesuaikan jumlah data dummy yang diinginkan
    }
}

