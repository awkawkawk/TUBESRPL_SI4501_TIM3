<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    protected $model = Campaign::class;

    public function definition()
    {
        return [
            'id_sekolah' => School::factory(), // Ini akan membuat school baru untuk setiap campaign
            'nama_campaign' => $this->faker->sentence,
            'foto_campaign' => $this->faker->optional()->imageUrl(640, 480, 'campaign', true),
            'deskripsi_campaign' => $this->faker->paragraphs(3, true),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'jenis_donasi' => $this->faker->randomElement(['uang', 'barang', 'uang_barang']),
            'catatan_campaign' => $this->faker->optional()->paragraph,
            'percentage_collected' => $this->faker->numberBetween(0, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
