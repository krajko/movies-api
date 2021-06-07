<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\AuthController;
use App\Http\Requests\CreateUserRequest;

Route::middleware('api')->post('register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::middleware('jwt')->get('/user/{token}', [AuthController::class, 'getUser']);

Route::middleware('api')->get('movies', [MoviesController::class, 'index']);
Route::middleware('api')->get('movies/{id}', [MoviesController::class, 'show']);
Route::middleware('api')->post('movies', [MoviesController::class, 'store']);
Route::middleware('api')->patch('movies/{id}', [MoviesController::class, 'update']);
Route::middleware('api')->delete('movies/{id}', [MoviesController::class, 'delete']);;
