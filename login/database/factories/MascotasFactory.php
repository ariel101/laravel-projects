<?php

namespace Database\Factories;

use App\Models\Propietario;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mascotas>
 */
class MascotasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $propietarioId = Propietario::pluck('id')->random();
        return [
            //
            'nombre'=>fake()->name(),
            'genero'=>fake()->randomElement(['M','F']),
            'edad'=>fake()->numberBetween(10,100),
            'raza'=>fake()->randomElement(['pitbull','salchicha','pastor aleman','rottweiler']),
            'propietarioId'=> $propietarioId,
            'direccion'=>fake()->address(),
        ];
    }
}
