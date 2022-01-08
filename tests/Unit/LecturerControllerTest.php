<?php

namespace Tests\Unit;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Semester;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use  Tests\TestCase;

class LecturerControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker, DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_index_route_can_be_reached()
    {
        $response = $this->get(route('lecturers.index'));
        $response->assertStatus(200);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_show_route_can_be_reached()
    {
        $lecturer = Lecturer::factory()->create();
        $response = $this->get(route('lecturers.show', ['lecturer' => $lecturer]));
        $response->assertStatus(200);
    }
}
