<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show($user_id)
    {
        $user = User::find($user_id);
   
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        
        return response()->json(['user' => $user]);
    }

    public function favorites($user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $favorites = $user->favorites;

        return response()->json(['favorites' => $favorites]);
    }
}
