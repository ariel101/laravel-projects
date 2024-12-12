<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductBusiness>
 */
class ProductBusinessFactory extends Factory
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
            'business_id' => Business::factory(), 
            'product_id' => Product::factory(), 
            'price' => $this->faker->randomFloat(2, 1, 100), // Precio aleatorio entre 1 y 100 
            'availability' => $this->faker->boolean(), // Disponibilidad aleatoria
        ];
    }
}
