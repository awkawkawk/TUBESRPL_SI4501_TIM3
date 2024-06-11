<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItemDonation;

class ItemDonationsTableSeeder extends Seeder
{
    public function run()
    {
        ItemDonation::factory()->count(50)->create(); // Sesuaikan jumlah data dummy yang diinginkan
    }
}


