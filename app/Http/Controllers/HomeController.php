<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\Repository\CourseRepository;
use App\Repositories\Eloquent\Repository\LecturerRepository;
use App\Repositories\Eloquent\Repository\SemesterRepository;
use App\Repositories\Eloquent\Repository\StudentRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    private $semesterRepository;
    private $courseRepository;
    private $lecturerRepository;
    private $studentRepository;
    public function __construct(
        SemesterRepository $semesterRepository,
        CourseRepository $courseRepository,
        StudentRepository $studentRepository,
        LecturerRepository $lecturerRepository
    ) {
        $this->semesterRepository = $semesterRepository;
        $this->courseRepository = $courseRepository;
        $this->studentRepository = $studentRepository;
        $this->lecturerRepository = $lecturerRepository;
    }

    public function __invoke()
    {
        $semesterCount = $this->semesterRepository->count();
        $studentCount = $this->studentRepository->count();
        $lecturerCount = $this->lecturerRepository->count();
        $courseCount = $this->courseRepository->count();
        return view('welcome', compact('semesterCount', 'lecturerCount', 'studentCount', 'courseCount'));
    }
}
