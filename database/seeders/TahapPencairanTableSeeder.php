<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TahapPencairan;

class TahapPencairanTableSeeder extends Seeder
{
    public function run()
    {
        TahapPencairan::factory()->count(5)->create(); // Sesuaikan jumlah data dummy yang diinginkan
    }
}

