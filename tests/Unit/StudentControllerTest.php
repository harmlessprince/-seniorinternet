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

class StudentControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker, DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_index_route_can_be_reached()
    {
        $response = $this->get(route('students.index'));
        $response->assertStatus(200);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_show_route_can_be_reached()
    {
        $student = Student::factory()->create();
        $response = $this->get(route('students.show', ['student' => $student]));
        $response->assertStatus(200);
    }
}
