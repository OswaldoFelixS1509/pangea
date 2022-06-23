<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacto>
 */
class ContactoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'correo' => $this->faker->safeEmail(),
            'telefono' => $this->faker->phoneNumber(),
            'nombre' => $this->faker->name(),
            'mensaje' => $this->faker->paragraphs(5, true),
            'leido' => false,
        ];
    }
}
