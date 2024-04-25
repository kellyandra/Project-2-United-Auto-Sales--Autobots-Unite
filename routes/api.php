<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/v1/auth/register',[AuthController::class, 'register']);
Route::post('/v1/auth/login', [AuthController::class, 'login']);

//middleware(['auth:api'])->
Route::prefix('v1')->group(function () {
    // Authentication routes
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    // Car routes
    Route::get('/cars', [CarController::class, 'index']);
    Route::post('/cars', [CarController::class, 'store']);
    Route::get('/cars/{car_id}', [CarController::class, 'show']);
    Route::post('/cars/{car_id}/favorite', [FavouritesController::class, 'store']);
    Route::get('/cars/{car_id}/favorite', [FavouritesController::class, 'store']);
    
    // User routes
    Route::post('/users/{user_id}', [UserController::class, 'show']);
    Route::get('/users/{user_id}/favorites', [FavouritesController::class, 'getUserFavorites']);
    
    // Search routes
    Route::get('/search', [SearchController::class, 'index']);
//KELLY NEEDS TO FIX! 
    // Add to favorites
    Route::post('/users/{user_id}/cars/{car_id}/favorite', [FavouritesController::class, 'addFavorite']);
// remove favorites
    Route::delete('/users/{user_id}/cars/{car_id}/unfavorite', [FavouritesController::class, 'removeFavorites']);
});
