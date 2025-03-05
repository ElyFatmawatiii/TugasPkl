<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentsController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/students', function () {
//     return view('students');
// });

Route::get('/user', [UserController::class, 'index']);
Route::get('/student', [StudentsController::class, 'index']);