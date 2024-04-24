<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;

class FavouritesController extends Controller
{
    public function addFavorite(Request $request, $user_id, $car_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        $car = Car::find($car_id);
        if (!$car) {
            return response()->json(['error' => 'Car not found'], 404);
        }
    
        // Check if the car is already in the user's favorites
        if ($user->favorites()->where('car_id', $car_id)->exists()) {
            return response()->json(['message' => 'Car is already in favorites']);
        }
    
        // Attach the car to user's favorites
        if (!$user->favorites()->where('car_id', $car_id)->exists()) {
            $user->favorites()->attach($car_id);
            return response()->json(['message' => 'Car added to favorites successfully']);
        }
        return response()->json(['message' => 'Car is already in favorites']);
    }

    public function getUserFavorites($user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $favorites = $user->favorites;

        return response()->json(['favorites' => $favorites]);
    }

    public function removeFavorite(Request $request, $user_id, $car_id)
{
    $user = User::find($user_id);

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    $car = Car::find($car_id);

    if (!$car) {
        return response()->json(['error' => 'Car not found'], 404);
    }

    // Remove/Detach the car from the user's favorites
    if ($user->favorites()->where('car_id', $car_id)->exists()) {
        $user->favorites()->detach($car_id);
        return response()->json(['message' => 'Car removed from favorites successfully']);
    }
    
    return response()->json(['message' => 'Car was not in favorites']);
}
}