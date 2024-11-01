<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
            'delivery_address' => $this->faker->address,
            'total_amount' => $this->faker->randomFloat(2, 10, 100),
            'city' => $this->faker->city,
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
            'order_datetime' => $this->faker->dateTime,
            'delivery_datetime' => $this->faker->dateTime,
        ];
    }
}
