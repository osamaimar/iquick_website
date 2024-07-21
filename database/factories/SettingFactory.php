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
    public function definition()
    {
        return [
            'name'=>fake()->name(),
            'small_description'=>fake()->paragraph(),
            'about_us'=>fake()->paragraph(),
            'phone'=>"01122455867",
            'email'=>fake()->unique()->safeEmail(),
            'address'=>fake()->unique()->word(),
            'facebook'=>fake()->unique()->url(),
            'twitter'=>fake()->unique()->url(),
            'insta'=>fake()->unique()->url(),
            'youtube'=>fake()->unique()->url(),
            'Linkedin'=>fake()->unique()->url(),
        ];
    }
}
