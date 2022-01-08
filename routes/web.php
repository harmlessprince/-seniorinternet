<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('dashboard');
Route::prefix('semesters')->name('semesters.')->group(function () {
    Route::get('/', [SemesterController::class, 'index'])->name('index');
    Route::get('/{semester}', [SemesterController::class, 'show'])->name('show');
});
Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/{course}', [CourseController::class, 'show'])->name('show');
});

Route::prefix('students')->name('students.')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/{student}', [StudentController::class, 'show'])->name('show');
});

Route::prefix('lecturers')->name('lecturers.')->group(function () {
    Route::get('/', [LecturerController::class, 'index'])->name('index');
    Route::get('/{lecturer}', [LecturerController::class, 'show'])->name('show');
});



