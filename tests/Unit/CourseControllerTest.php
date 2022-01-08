<?php

namespace Tests\Unit;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Semester;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker, DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_index_route_can_be_reached()
    {
//        dd(route('courses.index'));
        $response = $this->get(route('courses.index'));
        $response->assertStatus(200);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_show_route_can_be_reached()
    {
        $semester = Semester::factory()->create();
        $lecturer = Lecturer::factory()->create();
        $course = Course::factory()->create(['lecturer_id' => $lecturer->id, 'semester_id' => $semester->id]);
        $response = $this->get(route('courses.show', ['course' => $course]));
        $response->assertStatus(200);
    }
}
