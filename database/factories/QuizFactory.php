<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Quiz;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{

    protected $model = Quiz::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'score' => fake()->numberBetween(1,10),
            'deadline' => fake()->date(),
            'status' => 'active',
            'image' => fake()->imageUrl(),
            'created_at' => fake()->date()
        ];
    }

    public function notActive(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'not_active'
            ];
        });
    }

    public function withoutDescription(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'description' => null,
            ];
        });
    }

    public function withoutImage(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'image' => null
            ];
        });
    }
}
