<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();
        // Populate the pivot table
        Student::all()->each(function ($student) use ($courses) {
            $student->courses()->sync(
                $courses->random(rand(15, 20))->pluck('id')->toArray()
            );
        });
    }
}
