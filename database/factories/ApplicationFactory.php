<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title,
            'description' => fake()->text,
            'image' => fake()->imageUrl,
            'published' => true,
            'user_id' => 1,
            'category_id' => 1,
            'status_id' => 1,
        ];
    }
}
