<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
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
            //
            'name' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // Puedes cambiar esto según tus necesidades
            'phone_number' => $this->faker->regexify('[0-9]{8}'),
            'vehicle' => $this->faker->word, // Aquí puedes personalizar según el tipo de vehículo
            'placa' => $this->faker->regexify('[A-Z]{3}[0-9]{3}'), // Genera algo como ABC123
        ];
    }
}
