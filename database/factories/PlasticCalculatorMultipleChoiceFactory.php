<?php

namespace Database\Factories;

use App\Models\PlasticCalculatorQuestion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PlasticCalculatorMultipleChoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'plastic_calculator_question_id' => PlasticCalculatorQuestion::all()->random(),
            'choice' => fake()->sentence(),
            'choice_category' => fake()->word(),
            'slug' => fake()->slug,
            'user_id' => User::all()->random(),
        ];
    }
}
