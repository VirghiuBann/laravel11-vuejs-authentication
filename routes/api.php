<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', [AuthController::class, 'getUser'])->middleware('auth:sanctum');
