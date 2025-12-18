<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\QaUserAnswerController;

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/register', [SettingController::class, 'registerApp']);
    Route::post('/login', [SettingController::class, 'loginApp']);
    Route::post('/logout', [SettingController::class, 'logoutApp']);
    Route::post('/user', [SettingController::class, 'userApp']);
    Route::post('/question', [QaUserAnswerController::class, 'store']);
    Route::put('/question/{id}', [QaUserAnswerController::class, 'update']);
    Route::get('/survey/question', [QaUserAnswerController::class, 'getQuestionSurway']);
    Route::post('/survey/question', [QaUserAnswerController::class, 'storeQuestionSurway']);
    Route::post('/survey/answer', [QaUserAnswerController::class, 'storeAnswerSurway']);
    Route::post('/exercise', [QaUserAnswerController::class, 'createExercise']);
    Route::post('/exercise/item', [QaUserAnswerController::class, 'addExerciseItems']);
});