<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TimestampFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>$this->faker->numberBetween(1,300),
            'date' =>$this->faker->dateTimeBetween('-8 month'),
            'name' => $this->faker->name(),
            'workIn'=>$this->faker->time('H:i'),
            'workOut'=>$this->faker->time('H:i'),
            'breakIn'=>$this->faker->time('H:i'),
            'breakOut'=>$this->faker->time('H:i'),
        ];
    }
}
