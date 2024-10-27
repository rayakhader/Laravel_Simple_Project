<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {

    $job = Job::first();
    TranslateJob::dispatch($job);
    return 'Done';
});


Route::view('/', 'home');

// Route::controller(JobController::class)->group(function () {
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create',  [JobController::class, 'create']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
// });

// Route::resource('jobs', JobController::class)->only(['index', 'show']); // i don't want to be signed in 
// Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');


Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->middleware('throttle:10,1');
Route::post('/logout', [SessionController::class, 'destroy']);



Route::view('/contact', 'contact');
