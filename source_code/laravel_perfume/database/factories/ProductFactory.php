<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //fake du lieu
        return [
            'product_name' => $this->faker->streetName(),
            'quantity' => 100,
            'price' => $this->faker->randomFloat(2, 10, 300),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(),
            'category_id' => $this->faker->numberBetween(1, 7),
            'season_id' => $this->faker->numberBetween(1, 4),
            'size_id' => $this->faker->numberBetween(1, 6),
            'gender_id' => $this->faker->numberBetween(1, 3),
            'brand_id' => $this->faker->numberBetween(1, 6)
        ];
    }
}
