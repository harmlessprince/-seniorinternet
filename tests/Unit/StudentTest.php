<?php

namespace Tests\Unit;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use DatabaseMigrations, WithFaker;
    /**
     *
     *
     * @return void
     */
    public function test_students_table_has_expected_columns()
    {
         $this->assertTrue(
             Schema::hasColumns('students', [
               'id','first_name', 'last_name', 'email', 'slug'
           ]), 1);
    }

    /**
     *
     *
     * @return void
     */
    public function test_students_registered_for_one_or_more_courses()
    {
        $semester = Semester::factory()->create();
        $student = Student::factory()->create();
        $lecturer = Lecturer::factory()->create();
        $course = Course::factory()->create(['lecturer_id' => $lecturer->id, 'semester_id' => $semester->id]);
        $student->courses()->sync($course);
        $this->assertDatabaseHas('course_student', [
            'course_id' => $course->id,
            'student_id' => $student->id,
        ]);
    }
}
