<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
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
            'name' => $this->faker->company, 
            'business_type' => $this->faker->randomElement(['restaurant', 'pharmacy', 'store']), 'address' => $this->faker->address, 
            'phone_number' => $this->faker->phoneNumber, 
            'opening' => $this->faker->time($format = 'H:i:s', $max = 'now'), 
            'closing' => $this->faker->time($format = 'H:i:s', $max = 'now'), 
            'average_rating' => $this->faker->randomFloat(1, 1, 5),
        ];
    }
}
