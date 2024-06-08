<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donation;

class DonationsTableSeeder extends Seeder
{
    public function run()
    {
        Donation::factory()->count(50)->create(); // Sesuaikan jumlah data dummy yang diinginkan
    }
}
