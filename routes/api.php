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
    Route::post('/qa/store', [QaUserAnswerController::class, 'store']);

});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
