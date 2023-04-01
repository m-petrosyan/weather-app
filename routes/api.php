<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WeatherController;
use App\Http\Controllers\Api\WeatherHistoryController;
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
Route::post('user/login', [UserController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('user', [UserController::class, 'auth']);
    Route::get('weather', WeatherController::class);
    Route::get('weather/history', WeatherHistoryController::class);
});
