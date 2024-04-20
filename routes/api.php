<?php

use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/settings', SettingController::class);
Route::get('/cities', CityController::class);
Route::get('/districts/{city_id}', DistrictController::class);
Route::post('/messages', MessageController::class);

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->middleware('auth:sanctum');
});

Route::prefix('ads/')->controller(AdController::class)->group(function () {
    Route::get('index', 'index');
    Route::get('latest', 'latest');
    Route::get('domain/{domain_id}', 'domain');
    Route::get('/search', 'search');

    Route::middleware('auth:sanctum')->group(function (){
        Route::post('create' , 'createAds');
    });
});
