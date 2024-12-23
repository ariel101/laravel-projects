<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Client;
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
        $clientIds = Client::pluck('id')->toArray(); // Obtener todos los IDs de clientes 
        $clientId = $this->faker->randomElement($clientIds); // Seleccionar uno específico de la lista
        $categoryId = Category::inRandomOrder()->first()->id;
        return [
            //
            'client_id'=>$clientId, //asigna el id de cliente especifico
            'driver_id'=> $categoryId,
            'delivery_address' => $this->faker->address,
            'total_amount' => $this->faker->randomFloat(2, 10, 100),
            'city' => $this->faker->city,
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
            'order_datetime' => $this->faker->dateTime,
            'delivery_datetime' => $this->faker->dateTime,
        ];
    }
}
