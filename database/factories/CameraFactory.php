<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Camera;

/**
 * @extends Factory<\App\Models\Camera>
 */
class CameraFactory extends Factory
{
    protected $model = Camera::class;

    public function definition(): array
    {
        return [
            'marca' => $this->faker->randomElement(['Sony', 'Canon', 'Nikon', 'Panasonic']),
            'modelo' => $this->faker->bothify('Modelo-###'),
            'resolucao' => $this->faker->randomElement(['12MP', '24MP', '48MP', '4K']),
            'preco' => $this->faker->randomFloat(2, 500, 5000),
        ];
    }
}
