<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\StudentController;

//** 

// Route untuk menampilkan teks salam
Route::get('/salam', function () {
    return "ASSALAMUALAIKUM...";
});

Route::get('/profile', function () {
    return view('profile');
});






Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [DasboardController::class, 'index'])->name('dashboard');


    // Route untuk menampilkan halaman student
    Route::get('admin/student', [StudentController::class, 'index'])->middleware('admin');

    // Route untuk menampilkan halaman courses
    Route::get('admin/courses', [CoursesController::class, 'index']);



    // Route untuk menampilkan form tambah student
    Route::get('admin/student/create', [StudentController::class, 'create'])->middleware('admin');
    // Route untuk mengirim data student baru
    Route::post('admin/student/store', [StudentController::class, 'store']);

    // Route untuk menampilkan form tambah courses
    Route::get('admin/courses/create', [CoursesController::class, 'create'])->middleware('admin');
    // Route untuk mengirim data courses baru
    Route::post('admin/courses/store', [CoursesController::class, 'store']);


    // Route untuk menampilkan form edit student
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit'])->middleware('admin');
    // Route untuk menyimpan hasil update student
    Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

    // Route untuk menampilkan form edit courses
    Route::get('admin/courses/edit/{id}', [CoursesController::class, 'edit'])->middleware('admin');
    // Route untuk menyimpan hasil update courses
    Route::put('admin/courses/update/{id}', [CoursesController::class, 'update']);


    // Route untuk menghapus student
    Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);

    // Route untuk menghapus courses
    Route::delete('admin/courses/delete/{id}', [CoursesController::class, 'destroy']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
