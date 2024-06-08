<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // or use Hash::make('password')
            'profile_picture' => $this->faker->optional()->imageUrl(640, 480, 'people', true),
            'phone' => $this->faker->unique()->phoneNumber,
            'tipe_user' => $this->faker->randomElement(['admin', 'user']),
            'id_sekolah' => null, // or reference a school id if needed
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
