<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etel>
 */
class EtelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "darab" =>  $this->faker->numberBetween(1, 10),
            "tetelar" => $this->faker->numberBetween(1000, 4000),
        ];
    }
}
