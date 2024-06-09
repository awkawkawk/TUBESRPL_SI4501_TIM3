<?php

namespace Database\Factories;

use App\Models\Target;
use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class TargetFactory extends Factory
{
    protected $model = Target::class;

    public function definition()
    {
        return [
            'id_campaign' => Campaign::factory(), // Ini akan membuat campaign baru untuk setiap target
            'nama_barang' => $this->faker->word,
            'jumlah_barang' => $this->faker->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
