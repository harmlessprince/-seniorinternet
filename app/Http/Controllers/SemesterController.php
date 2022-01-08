<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use App\Repositories\Eloquent\Repository\SemesterRepository;

class SemesterController extends Controller
{

    private $semesterRepository;
    public function __construct(SemesterRepository $semesterRepository)
    {
        $this->semesterRepository = $semesterRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::withCount('courses')->get();
        return view('pages.semester.index', compact('semesters'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        $semester  = $semester->load(['courses', 'courses.students', 'courses.lecturer']);
        return view('pages.semester.show', compact('semester'));
    }
}
