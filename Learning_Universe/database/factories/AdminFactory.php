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
            'name' => 'Admin Minerva',
            'email' => $this->faker->unique()->randomElement(['reza@gmail.com', 'ojan@gmail.com']),
            'email_verified_at' => now(),
            'password' => Hash::make('01101100'), // Password default untuk semua akun admin
        ];
    }
}
