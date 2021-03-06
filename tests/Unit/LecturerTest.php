<?php

namespace Tests\Unit;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Semester;
use Database\Seeders\SemesterSeeder;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class LecturerTest extends TestCase
{
    use RefreshDatabase, WithFaker, DatabaseMigrations;

    /**
     *
     *
     * @return void
     */
    public function test_lecturers_table_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('lecturers', [
                'id','first_name', 'last_name', 'email', 'slug'
            ]), 1);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_lecturer_has_many_courses()
    {
        $semester = Semester::factory()->create();
        $lecturer = Lecturer::factory()->create();
        $course = Course::factory()->create(['lecturer_id' => $lecturer->id, 'semester_id' => $semester->id]);
        $this->assertTrue($lecturer->courses->contains($course));
    }
}
