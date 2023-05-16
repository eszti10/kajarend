<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FelhasznaloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prefix = '$2y$';
        $cost = '10';
        $salt = '$aztakurvaeletbehogyazistenit$';
        $blowFishPrefix = $prefix.$cost.$salt;
        $password = 'korte';
        $hash = crypt( $password, $blowFishPrefix);

        return [

            "fnev" =>  $this->faker->userName(),
            "jelszo" => $hash,
            "email" => $this->faker->email(),
            "vnev" => $this->faker->lastName(),
            "knev" => $this->faker->firstName(),
            "cim" => $this->faker->streetAddress(),
            "jogosultsagID" => $this->faker->numberBetween($min = 1, $max = 3)
        ];
    }
}
