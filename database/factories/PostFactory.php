<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4, true),
            'description' => $this->faker->sentence(5, true),
            'content' => $this->faker->paragraphs(5, true),
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
        ];
    }
}
