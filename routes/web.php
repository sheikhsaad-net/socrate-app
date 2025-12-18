<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QaUserAnswerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/users', function () {return view('users');})->name('users');
    Route::get('/privacypolicy', function () {return view('policy');})->name('privacypolicy');
    Route::get('/questions', function () {return view('questions');})->name('questions');

    Route::get('/users/{user}', [QaUserAnswerController::class, 'show'])->name('users.show');
    Route::get('/survey/{entry}', [QaUserAnswerController::class, 'survey'])->name('survey.show');

    Route::get('/exercise/{user}', [QaUserAnswerController::class, 'exercise'])->name('exercise.show');
    Route::get('/exercise/view/{id}', [QaUserAnswerController::class, 'viewExercise'])->name('exercise.view');

});