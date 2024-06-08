<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Target;

class TargetsTableSeeder extends Seeder
{
    public function run()
    {
        Target::factory()->count(50)->create(); // Anda bisa mengatur jumlah data dummy yang diinginkan
    }
}
