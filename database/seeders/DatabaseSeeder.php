<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Setting;
use App\Models\Category;
use App\Models\BloodType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // $this->call(GovernmentSeeder::class);
        // BloodType::factory(6)->create();
        // Client::factory(15)->create();
        // Category::factory(10)->create();
        Setting::factory(1)->create();

        // \App\Models\User::create([
        //     'name' => 'Omar Khattab',
        //     'email' => 'omar@khattab.com',
        //     'password' => bcrypt(123456),
        // ]);

    }
}
