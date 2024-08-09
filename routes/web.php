<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ LoginController, RegisteredUserController ,StudentController};

// Register a User
Route::get('/register', [RegisteredUserController::class, 'create']); //Register Page
Route::post('/register', [RegisteredUserController::class, 'store']); //New Registeration

//User Session
Route::post('/login', [LoginController::class, 'store']); //Login Action
Route::post('/logout', [LoginController::class, 'destroy']); //Logout Action

// Student List Action
Route::middleware(['auth'])->group(function () {
    Route::post('/students', [StudentController::class, 'store']);// Create a new student
    Route::get('/dashboard', [StudentController::class, 'index']); // View Existing student records
    Route::put('/students/{student}', [StudentController::class, 'update']); // Update a student record
    Route::delete('/students/{student}', [StudentController::class, 'destroy']); // Delete a student record
});

Route::view('/', 'Auth.login')->name('login');
