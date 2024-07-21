<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
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
            "App\Models\Order",
        ];
        $attachmentableType =$attachmentable[rand(0,count($attachmentable)-1)];
        $attachmentable = $attachmentableType::factory()->create();
        return [
            'name'=>fake()->name(),
            'file'=>"https://picsum.photos/seed/picsum/200/300",
            'attachmentable_type'=>$attachmentableType,
            'attachmentable_id'=>$attachmentable->id,
            'user_id'=>User::all()->random()->id
        ];
    }
}
