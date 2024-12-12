<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// Route to show all works (jobs)

Route::resource('works', JobController::class);

// Route::get('/works', [JobController::class, 'index'])->name('works.index');

// // Route to show a single job (work)
// Route::get('/works/{job}', [JobController::class, 'show'])->name('works.show');

// // Route to display the job creation form
// Route::get('/works/create', [JobController::class, 'create'])->name('works.create');
// // Route to store a new job
// Route::post('/works', [JobController::class, 'store'])->name('works.store');

// // Route to display the job editing form
// Route::get('/works/{job}/edit', [JobController::class, 'edit'])->name('works.edit');

// // Route to update an existing job
// Route::put('/works/{job}', [JobController::class, 'update'])->name('works.update');

// // Route to delete a job
// Route::delete('/works/{job}', [JobController::class, 'destroy'])->name('works.destroy');
