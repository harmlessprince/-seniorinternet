<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomString = strtoupper(Str::random(3));
        $threeDigitRandomNumber = rand(100,500);
        $code = $randomString."".$threeDigitRandomNumber;
        $lecturerIdArray =  range(1, 10);
        $lecturerId = $lecturerIdArray[array_rand($lecturerIdArray)];
        $semesterIdArray =  [1,2];
        $semesterId = $semesterIdArray[array_rand($semesterIdArray)];
    
        return [
           'code' => $code,
           'description' => $this->faker->text,
           'semester_id' => $semesterId,
           'lecturer_id' => $lecturerId
        ];
    }
}
