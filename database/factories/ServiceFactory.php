<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
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
            'slug'=>Str::of(fake()->name())->slug('-'),
            'image'=>"https://picsum.photos/seed/picsum/200/300",
            'image_single'=>"https://picsum.photos/seed/picsum/200/300",
            'description'=>fake()->paragraph(),
            'price'=>rand(10,100),
            'user_id'=>User::all()->random()->id
        ];
    }
}
