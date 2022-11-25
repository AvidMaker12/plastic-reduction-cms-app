<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     * Note: 'score' table stores scores per category only; JS calculates grand total score via summation of all categories scores.
     */
    public function definition()
    {
        return [
            // Notes: No columns related to 'id', 'images', 'timestamps' are listed here.
            'score' => fake()->numberBetween(0, 10), // Ex. Scored 5 out of 10 total available points.
            'total_point' => fake()->numberBetween(0, 10), // Ex. 10 total available points to score.
            'score_percent' => fake()->numberBetween(0, 100), // Ex. Scored 50% for 'Home' category of plastic reduction calculator.
            'score_category' => fake()->word(), // Ex. 'Home' category from plastic reduction calculator.
            'user_id' => User::all()->random(),
        ];
    }
}
