<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->streetAddress(),
            'telephone_number' => fake()->phoneNumber(),
            'description'=> fake()->text($maxNbChars = 200),
            'category_id'=> fake()->numberBetween($min = 1, $max = 5)
        ];
    }
}
