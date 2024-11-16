<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/{studentId}/teachers', [StudentController::class, 'showTeachers'])->name('showTeachers');

Route::get('/student/teachers', [StudentController::class, 'showTeacherswithStudents'])->name('showTeacherswithStudents');

Route::get('/create', [StudentController::class, 'create'])->name('create');

Route::post('/store', [StudentController::class, 'store'])->name('store');
