<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:api'])->prefix('v1')->group(function () {
    // Authentication routes
    Route::post('auth/register',[AuthController::class, 'register']);
    Route::post('auth/login', [AuthController::class, 'login']);
    Route::post('auth/logout', [AuthController::class, 'logout']);

    // Car routes
    Route::get('/cars', [CarController::class, 'index']);
    Route::post('/cars', [CarController::class, 'store']);
    Route::get('cars/{car_id}', [CarController::class, 'show']);
    Route::post('cars/{car_id}/favorite', [FavoritesController::class, 'store']);
    
    // User routes
    Route::post('users/{user_id}', [UserController::class, 'show']);
    Route::post('users/{user_id}/favorites', [FavoritesController::class, 'userFavorites']);
    
    // Search routes
    Route::get('/search', [SearchController::class, 'index']);
});
