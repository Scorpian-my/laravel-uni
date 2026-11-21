<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => fake()->sentence(3),
            'origin' => 'تهران',
            'destination' => 'مشهد',
            'departure_at' => fake()->dateTimeBetween('now', '+1 month'),
            'arrival_at' => fake()->dateTimeBetween('+1 month', '+2 month'),
            'flight_number' => 'IR'.fake()->numberBetween(100, 999),
            'price' => fake()->randomFloat(2, 10, 500),
            'stock' => fake()->numberBetween(1, 30),
            'image' => null,
            'description' => fake()->optional()->sentence(),
            'is_done' => false,
        ];
    }

    public function done(): static
    {
        return $this->state(fn (array $attributes): array => ['is_done' => true]);
    }
}
