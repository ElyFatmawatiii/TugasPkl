<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Student;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/registeruser', [RegisterUserController::class, 'create'])->name('user.register');
Route::post('/registeruser', [RegisterUserController::class, 'store'])->name('user.register.store');

// Route::get('/registeruser', [RegisterUserController::class, 'create'])->name('registeruser');

Route::get('/register', function () {
    return redirect()->route('pendaftaran.store');
});

// Middleware auth untuk halaman yang memerlukan login
Route::prefix('pendaftaran')->group(function () {
    Route::get('/', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::get('/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('/store', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/pendaftaran/edit/{id}', [PendaftaranController::class, 'edit'])->name('pendaftaran.edit'); 
    Route::put('/pendaftaran/update/{id}', [PendaftaranController::class, 'update'])->name('pendaftaran.update');
    Route::delete('/pendaftaran/destroy/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
    Route::get('/pendaftaran/show/{id}', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
});

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::prefix('students')->group(function () {
        Route::get('/', [StudentsController::class, 'index'])->name('students');
        Route::get('/create', [StudentsController::class, 'create'])->name('students.create');
        Route::post('/store', [StudentsController::class, 'store'])->name('students.store');
        Route::get('/students/{id}/show', [StudentsController::class, 'show'])->name('students.show');
        Route::get('/students/{id}/edit', [StudentsController::class, 'edit'])->name('students.edit');
        Route::put('/students/{id}', [StudentsController::class, 'update'])->name('students.update');
        Route::delete('/delete/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');
    });

    Route::prefix('teacher')->group(function () {
        Route::get('/', [TeacherController::class, 'index'])->name('teacher');
        Route::get('/create', [TeacherController::class, 'create'])->name('teacher.create');
        Route::post('/store', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get('/teacher/show/{id}', [TeacherController::class, 'show'])->name('teacher.show');
        Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::put('/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
        Route::delete('/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    });

    Route::prefix('mapel')->group(function () {
        Route::get('/', [MapelController::class, 'index'])->name('mapel');
        Route::get('/mapel/create', [MapelController::class, 'create'])->name('mapel.create');
        Route::post('/mapel/store', [MapelController::class, 'store'])->name('mapel.store');
        Route::get('/mapel/edit/{kode_mapel}', [MapelController::class, 'edit'])->name('mapel.edit');
        Route::put('/mapel/update/{kode_mapel}', [MapelController::class, 'update'])->name('mapel.update');
        Route::delete('/mapel/destroy/{kode_mapel}', [MapelController::class, 'destroy'])->name('mapel.destroy');
    });

    Route::prefix('nilai')->group(function () {
        Route::get('/', [NilaiController::class, 'index'])->name('nilai');
        Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
        Route::post('/nilai/store', [NilaiController::class, 'store'])->name('nilai.store');
        Route::get('/nilai/edit/{id}', [NilaiController::class, 'edit'])->name('nilai.edit');
        Route::put('/nilai/update/{id}', [NilaiController::class, 'update'])->name('nilai.update');
        Route::delete('/nilai/destroy/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
    });

    Route::get('/nilai/export-pdf', [PdfController::class, 'exportPdf'])->name('nilai.export-pdf');

    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



require __DIR__ . '/auth.php';
