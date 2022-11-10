<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => str($this->faker->sentence)->slug()->toString(),
            'excerpt' => $this->faker->sentence,
            'content' => $this->faker->text,
        ];
    }

    public function published(): self
    {
        return $this->state(fn () => ['released_at' => now()->subDay()]);
    }

    public function draft(): self
    {
        return $this->state(fn () => ['released_at' => null]);
    }
}
