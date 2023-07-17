<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MyExpense>
 */
class MyExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 2,
            'name' => fake()->word(),
            'price' => fake()->numberBetween(10, 10000),
            'transection_date' => fake()->dateTimeBetween($startDate = '-4 month', $endDate = 'now', $timezone = null)
        ];
    }
}
