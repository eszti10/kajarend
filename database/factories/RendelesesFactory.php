<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rendeleses>
 */
class RendelesesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "osszar" =>  $this->faker->number(),
            "megjegyzes" => $this->faker->text(),
            "datum" => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            "telszam" =>  $this->faker->phoneNumber(),

        ];
    }
}
