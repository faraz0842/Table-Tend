<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'delivery_fee' => fake()->numberBetween(30, 100),
            'available' => fake()->numberBetween(0, 1),
        ];
    }
}
