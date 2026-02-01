<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('-2 month', 'now'),
            'weight' => $this->faker->randomFloat(1, 45, 75),
            'calories' => $this->faker->numberBetween(1200, 3000),
            'exercise_time' => $this->faker->numberBetween(0, 50),
            'exercise_content' => $this->faker->realText(120),
        ];
    }
}
