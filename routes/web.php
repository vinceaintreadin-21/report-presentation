<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/{studentId}/teachers', [StudentController::class, 'showTeachers'])->name('showTeachers');

Route::get('/student/teachers', [StudentController::class, 'showTeacherswithStudents'])->name('showTeacherswithStudents');

Route::get('/create', [StudentController::class, 'create'])->name('create');

Route::post('/store', [StudentController::class, 'store'])->name('store');

Route::middleware('guest')->group(function () {
    // Login routes
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login'); // Form display
    Route::post('/login', [AuthController::class, 'login'])->name('login.process'); // Form submission

    // Register routes
    Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm'); // Form display
    Route::post('/register', [AuthController::class, 'register'])->name('register.process'); // Form submission
});

Route::middleware('auth')->group(function () {
    // Dashboard and logout routes
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

