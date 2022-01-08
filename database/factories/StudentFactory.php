<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first_name = $this->faker->firstName;
        return [
            'first_name' => $first_name,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'slug' => Str::slug($first_name, '-')
        ];
    }
}
