<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Repositories\Eloquent\Repository\CourseRepository;

class CourseController extends Controller
{

    private $courseRepository;
    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->courseRepository->all(['*'], ['lecturer', 'students']);
        return view('pages.course.index', compact('courses'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $course = $course->load('semester', 'lecturer', 'students');
        return view('pages.course.show', compact('course'));    
    }
}
