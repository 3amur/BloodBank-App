<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\BloodType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->email(),
            'd_o_b' => fake()->date(),
            'blood_type_id' => rand(1,6),
            'last_donation_date' => fake()->date(),
            'city_id' => rand(1,50),
            'phone' => fake()->phoneNumber(),
            'password' => fake()->password(),
        ];
    }
}
