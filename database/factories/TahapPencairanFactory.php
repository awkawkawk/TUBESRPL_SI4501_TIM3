<?php

namespace Database\Factories;

use App\Models\TahapPencairan;
use Illuminate\Database\Eloquent\Factories\Factory;

class TahapPencairanFactory extends Factory
{
    protected $model = TahapPencairan::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

