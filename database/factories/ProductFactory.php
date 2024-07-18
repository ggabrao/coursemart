<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 2),
            'name' => fake()->randomElement(['Fruit', 'Laptop', 'Computer', 'Cable', 'Smartphone', 'Book', 'Chair']),
            'description' => fake()->text(20),
            'quantity' => fake()->numberBetween(1, 10),
            'price' => fake()->randomFloat(2, 1, 1000)
        ];
    }
}

;
