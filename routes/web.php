<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('main');
})->where('any', '.*');

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [RegisterController::class, 'login']);
Route::post('/logout', [RegisterController::class, 'logout']);
Route::get('/user', [RegisterController::class, 'getUser']);
