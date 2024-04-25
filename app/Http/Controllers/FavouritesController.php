<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class FavouritesController extends Controller
{
    public function addFavorite(Request $request)
    {
        $userID = Auth::id();
        $user = User::find($userID);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        $carId = $request->input('car_id');

        $isFavorite = $user->favoriteCars()->where('car_id', $carId)->exists();
        if($isFavorite){

            $user->favoriteCars()->detach($carId); // Removes the favorite car
            return response()->json(['status' => $isFavorite, 'message' => 'Car removed from favorites.']);

        }else {
            $user->favoriteCars()->attach($carId); // Adds a new favorite car
            return response()->json(['status' => $isFavorite, 'message' => 'Car added favorites.']);
        }
    }

    public function getUserFavorites($user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $favorites = $user->favoriteCars;

        return response()->json(['favorites' => $favorites]);
    }

    public function isFavorite($car_id) {
        $userID = Auth::id();
        $user = User::find($userID);
        $isFavorited = $user->favoriteCars()->where('car_id', $car_id)->exists();

        return response()->json([
            'status' => $isFavorited
        ]);

    }
}