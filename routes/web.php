<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('main');
})->where('any', '.*');

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
