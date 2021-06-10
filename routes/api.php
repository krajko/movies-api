<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\AuthController;

Route::post('register', [AuthController::class, 'register'])->middleware('guest:api');
Route::post('login', [AuthController::class, 'login'])->middleware('guest:api');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');

Route::resource('movies', MoviesController::class)->middleware('auth:api');
