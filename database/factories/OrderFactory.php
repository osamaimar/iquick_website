<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $attachmentable =[
            "App\Models\Service",
            "App\Models\Package",
        ];
        $attachmentableType =$attachmentable[rand(0,count($attachmentable)-1)];
        $attachmentable = $attachmentableType::factory()->create();
        return [
            'name'=>fake()->name(),
            'file'=>"https://picsum.photos/seed/picsum/200/300",
            'status'=>"done",
            'total_price'=>rand(150,500),
            'description_cust'=>fake()->paragraph(),
            'type_order'=>$attachmentableType=="App\Models\Service"? "service" : "package",
            'user_id'=>User::all()->random()->id,
            'type_id'=>$attachmentable->id,
            'profile_id'=>rand(1,50),
        ];
    }
}
