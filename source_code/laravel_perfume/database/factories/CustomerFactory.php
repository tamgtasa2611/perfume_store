<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class CustomerFactory extends Factory
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
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->email(),
            'password' => Hash::make('123456'),
            'phone_number' => $this->faker->numberBetween(010000000, 9999999999),
            'address' => $this->faker->address(),
//            1 = active
//            2 = locked
            'status' => $this->faker->numberBetween(1, 2)
        ];
    }
}
