<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(
                $this->faker->numberBetween(2, 8),
                true
            ),
            'description' => $this->faker->sentence(8, true),
            'active' => $this->faker->boolean(),
        ];
    }
}
