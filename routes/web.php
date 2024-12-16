<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home page route
Route::get('/', [JobController::class, 'index']);

// Route to manage works (jobs) — this seems like an admin route
Route::get('/works/manage', [JobController::class, 'manage'])->name('manage')->middleware('auth');

// User authentication routes
Route::get('users/login', [UserController::class, 'login_show']);
Route::get('users/register', [UserController::class, 'register_show']);
Route::post('users/login', [UserController::class, 'login'])->name('login');
Route::post('users/register', [UserController::class, 'register'])->name('register');
Route::post('users/logout', [UserController::class, 'logout'])->name('logout');

// Job routes
Route::get('/works/create', [JobController::class, 'create'])->name('works.create')->middleware('auth');
Route::get('/works', [JobController::class, 'index'])->name('works.index'); // List all jobs
Route::get('/works/{work}', [JobController::class, 'show'])->name('works.show'); // Show a single job
// Create a job form
Route::post('/works', [JobController::class, 'store'])->name('works.store')->middleware('auth'); // Store a new job
Route::get('/works/{work}/edit', [JobController::class, 'edit'])->name('works.edit')->middleware('auth'); // Edit a job form
Route::put('/works/{work}', [JobController::class, 'update'])->name('works.update')->middleware('auth'); // Update a job
Route::delete('/works/{work}', [JobController::class, 'destroy'])->name('works.destroy')->middleware('auth'); // Delete a job
