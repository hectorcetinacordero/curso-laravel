<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title  = fake()->text(100);
        return [
            'author_id' => 1,
            'title' => $title,
            'body' => fake()->realText(),
            'image' => fake()->imageUrl(),
            'slug' => Str::slug($title),
            'status' => 'published'
        ];
    }
}
