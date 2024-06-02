<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BloodType>
 */
class BloodTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $blood_Types = [
            'A+',
            'B+',
            'O+',
            'O-',
            'AB+',
            'AB-',
        ];
        return [
            'name' => fake()->unique()->randomElement($blood_Types),
        ];
    }
}
