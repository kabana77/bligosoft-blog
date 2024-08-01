<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ArticleFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => 1,
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'desc' => fake()->paragraph(),
            'img'=> fake()->image('public/storage/back', 1947, 843, null, false),
            'alt' => 'alt image text',
            'views' => 0,
            'status' => 0
        ];
    }
}
