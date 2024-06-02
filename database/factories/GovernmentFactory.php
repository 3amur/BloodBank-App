<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Government;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Government>
 */
class GovernmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $governments = [
            'Cairo','Giza','Alexandria','Aswan','Assiut','Beheira','Beni Suef','Dakahlia','Damietta','Fayoum',
            'Gharbia','Ismailia', 'Kafr el-Sheikh', 'Matrouh', 'Minya', 'Menofia', 'New Valley', 'North Sinai',
            'Port Said', 'Qualyubia', 'Qena', 'Red Sea', 'Al-Sharqia', 'Sohag', 'South Sinai', 'Suez', 'Luxor',
        ];   
        return [
            'name' => fake()->unique()->randomElement($governments),
        ];
    }
    
    public function withCities($count = 5)
    {
        return $this->afterCreating(function (Government $government) use ($count) {
            City::factory()->count($count)->create(['government_id' => $government->id]);
        });
    }
}
