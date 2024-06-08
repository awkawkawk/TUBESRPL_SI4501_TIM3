<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition()
    {
        return [
            'release_date' => $this->faker->date,
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(), // Jika tidak ada URL gambar, ganti dengan null
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

