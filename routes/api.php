<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Requests\CreateUserRequest;

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware('api')->get('movies', [MoviesController::class, 'index']);
Route::middleware('api')->get('movies/{id}', [MoviesController::class, 'show']);
Route::middleware('api')->post('movies', [MoviesController::class, 'store']);
Route::middleware('api')->patch('movies/{id}', [MoviesController::class, 'update']);
Route::middleware('api')->delete('movies/{id}', [MoviesController::class, 'delete']);;
