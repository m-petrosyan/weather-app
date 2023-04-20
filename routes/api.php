<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('user', [UserController::class, 'store']);
Route::post('user/login', [AuthController::class, 'login']);
Route::get('weather', [WeatherController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('user', [AuthController::class, 'auth']);
    Route::get('weather/history', [WeatherController::class, 'history']);
});
