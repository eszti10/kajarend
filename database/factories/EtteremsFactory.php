<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etterems>
 */
class EtteremsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nev" =>  $this->faker->name(),
            "cim" => $this->faker->streetAddress(),
            "telszam" => $this->faker->phoneNumber(),
        ];
    }
}
