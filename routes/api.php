<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MoviesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->get('movies', [MoviesController::class, 'index']);
Route::middleware('api')->get('movies/{id}', [MoviesController::class, 'show']);
Route::middleware('api')->post('movies', [MoviesController::class, 'store']);
Route::middleware('api')->put('movies/{id}', [MoviesController::class, 'update']);
Route::middleware('api')->delete('movies/{id}', [MoviesController::class, 'delete']);;
