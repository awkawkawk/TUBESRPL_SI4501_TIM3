<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\History;

class HistoriesTableSeeder extends Seeder
{
    public function run()
    {
        History::factory()->count(10)->create(); // Sesuaikan jumlah data dummy yang diinginkan
    }
}
