<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolsTableSeeder extends Seeder
{
    public function run()
    {
        School::factory()->count(50)->create(); // Anda bisa mengatur jumlah data dummy yang diinginkan
    }
}

