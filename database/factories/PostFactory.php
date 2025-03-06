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
        $title = fake()->sentence(fake()->numberBetween(5, 10));
        return [
            'title' => $title,
            'slug' => Str::of($title)->slug('-'),
            'content' => fake()->paragraph(fake()->numberBetween(2, 6)),
            'published_at' => fake()->dateTimeThisYear()
        ];
    }
}
