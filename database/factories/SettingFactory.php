<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'notification_settings_text' => fake()->paragraph(4),
            'about_app' => fake()->paragraph(20),
            'phone' => '01061138754',
            'email' => 'omarmuhammed.k@gmail.com',
            'fb_link' => 'https://www.facebook.com/profile.php?id=100005905234471',
            'tw_link' => 'https://x.com/omarbahga',
            'insta_link' => 'https://www.instagram.com/3amurr_/',
            'you_link' => 'https://www.youtube.com/channel/UC9jonSc1EPHUThUk_Wy3tKA',
        ];
    }
}
