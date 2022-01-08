<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         $first_name = $this->faker->firstName();
         $last_name = $this->faker->lastName();
        return [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $this->faker->safeEmail,
            'slug' => $first_name,
        ];
    }
}
