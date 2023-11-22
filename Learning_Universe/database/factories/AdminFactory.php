<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'Admin',
            'email' => $this->faker->unique()->randomElement(['reza@gmail.com', 'ojan@gmail.com']),
            'email_verified_at' => now(),
            'password' => Hash::make('rezaojanskiel106'), // Password default untuk semua akun admin
        ];
    }
}
