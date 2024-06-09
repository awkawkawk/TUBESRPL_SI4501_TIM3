<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    protected $model = School::class;

    public function definition()
    {
        return [
            'logo_sekolah' => $this->faker->optional()->imageUrl(640, 480, 'school', true),
            'nama_sekolah' => $this->faker->company,
            'alamat_sekolah' => $this->faker->address,
            'no_telepon_sekolah' => $this->faker->unique()->phoneNumber,
            'email_sekolah' => $this->faker->unique()->safeEmail,
            'nama_pendaftar' => $this->faker->optional()->name,
            'no_hp_pendaftar' => $this->faker->optional()->phoneNumber,
            'email_pendaftar' => $this->faker->optional()->safeEmail,
            'identitas_pendaftar' => $this->faker->optional()->word,
            'bukti_id_pendaftar' => $this->faker->optional()->imageUrl(640, 480, 'documents', true),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
