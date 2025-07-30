<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/register', [SettingController::class, 'registerApp']);
    Route::post('/login', [SettingController::class, 'login']);

});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
