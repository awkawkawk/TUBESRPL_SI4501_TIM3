<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;

class CampaignsTableSeeder extends Seeder
{
    public function run()
    {
        Campaign::factory()->count(50)->create(); // Anda bisa mengatur jumlah data dummy yang diinginkan
    }
}
