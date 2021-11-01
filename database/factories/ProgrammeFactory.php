<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'name' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(3),
            'duration' => $this->faker->randomDigitNotNull * 60 * 60,
        ];
    }
}
