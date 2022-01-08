<?php

namespace Tests\Unit;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Semester;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class SemesterTest extends TestCase
{
    use RefreshDatabase, WithFaker, DatabaseMigrations;
    /**
     *
     *
     * @return void
     */
    public function test_semesters_table_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('semesters', [
                'id','name', 'slug'
            ]), 1);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_semester_has_many_courses()
    {
        $semester = Semester::factory()->create();
        $lecturer = Lecturer::factory()->create();
        $course = Course::factory()->create(['lecturer_id' => $lecturer->id, 'semester_id' => $semester->id]);
        $this->assertTrue($semester->courses->contains($course));
    }

}
