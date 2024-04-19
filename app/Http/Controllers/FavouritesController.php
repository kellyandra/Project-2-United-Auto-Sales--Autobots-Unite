<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;

class FavoritesController extends Controller
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

        // Attach the car to user's favorites
        $user->favorites()->attach($car_id);

        return response()->json(['message' => 'Car added to favorites successfully']);
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
}