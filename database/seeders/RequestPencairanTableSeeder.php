<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RequestPencairan;

class RequestPencairanTableSeeder extends Seeder
{
    public function run()
    {
        RequestPencairan::factory()->count(10)->create(); // Sesuaikan jumlah data dummy yang diinginkan
    }
}
