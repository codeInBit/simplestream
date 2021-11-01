<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Channel;
use App\Models\Programme;

class TimetableFactory extends Factory
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
            'channel_id' => Channel::inRandomOrder()->value('id'),
            'programme_id' => Programme::inRandomOrder()->value('id'),
            'date' => $this->faker->dateTimeBetween('-5 month', '+2 month'),
            'start_time' => $this->faker->time($format = 'H:i:s'),
            'end_time' => $this->faker->time($format = 'H:i:s'),
            'timezone' => $this->faker->timezone,
        ];
    }
}
