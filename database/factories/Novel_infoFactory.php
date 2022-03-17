<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\novels;
use Database\Factories\NovelsFactory;

class Novel_infoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'novel_id' => $this->faker->numberBetween(1, 100),
            'page' => $this->faker->numberBetween(1, 5),
            'subtitle' => $this->faker->name,
            'episode' => $this->faker->realText,
        ];
    }
}
