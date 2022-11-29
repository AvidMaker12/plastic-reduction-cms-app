<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PlasticProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // Notes: No columns related to 'id', 'images', 'timestamps' are listed here.
            'plastic_product_name' => fake()->unique()->word(),
            'category' => fake()->word(),
            'description' => fake()->unique()->sentence(),
            'product_stat' => fake()->unique()->sentence(),
            'user_id' => User::all()->random(),
        ];
    }
}
