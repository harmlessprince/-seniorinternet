<?php

namespace Tests\Unit;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase, WithFaker, DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_course_belongs_to_a_semester()
    {
        $semester = Semester::factory()->create();
        $lecturer = Lecturer::factory()->create();
        $course = Course::factory()->create(['lecturer_id' => $lecturer->id, 'semester_id' => $semester->id]);
        $this->assertEquals(1, $course->semester->count());
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_course_belongs_to_a_lecturer()
    {
        $semester = Semester::factory()->create();
        $lecturer = Lecturer::factory()->create();
        $course = Course::factory()->create(['lecturer_id' => $lecturer->id, 'semester_id' => $semester->id]);
        $this->assertEquals(1, $course->lecturer->count());
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_course_belongs_to_one_or_more_students()
    {
        $semester = Semester::factory()->create();
        $lecturer = Lecturer::factory()->create();
        $student = Student::factory()->create();
        $course = Course::factory()->create(['lecturer_id' => $lecturer->id, 'semester_id' => $semester->id]);
        $student->courses()->sync($course);
        $this->assertDatabaseHas('course_student', [
            'course_id' => $course->id,
            'student_id' => $student->id,
        ]);
    }
}
