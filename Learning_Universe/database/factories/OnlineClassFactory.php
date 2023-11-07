<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OnlineClass>
 */
class OnlineClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'class_picture' => 'public/asset/Logo_Learning-Universe.png',
        'class_title' => $this->faker->name(),
        'class_description' => $this->faker->text(),
        'class_price' => $this->faker->randomNumber(3),
        'class_lessons' => $this->faker->randomNumber(2),
        'class_members' => $this->faker->randomNumber(2),
        'class_ratings' => $this->faker->randomNumber(4)
    ];
}
}
