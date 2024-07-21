<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>fake()->name(),
            'description'=>fake()->paragraph(),
            'image1'=>"https://picsum.photos/seed/picsum/200/300",
            'image2'=>"https://picsum.photos/seed/picsum/200/300",
            'image3'=>"https://picsum.photos/seed/picsum/200/300",
            'image4'=>"https://picsum.photos/seed/picsum/200/300",
            
        ];
    }
}
