<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Http\Requests\StoreLecturerRequest;
use App\Http\Requests\UpdateLecturerRequest;
use App\Repositories\Eloquent\Repository\LecturerRepository;

class LecturerController extends Controller
{
    private $lecturerRepository;
    public function __construct(LecturerRepository $lecturerRepository)
    {
        $this->lecturerRepository = $lecturerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = $this->lecturerRepository->all();
        return view('pages.lecturer.index', compact('lecturers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        $lecturer = $lecturer->load('courses');
        return view('pages.lecturer.show', compact('lecturer'));
    }


}
