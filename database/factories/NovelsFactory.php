<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class NovelsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'user_id' => $this->faker->numberBetween(1, 100),
            'novel_title' => $this->faker->name,
            'novel_information' => $this->faker->realText,
        ];
    }
}
