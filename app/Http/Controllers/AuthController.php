<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; 



class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'location' => 'required|string|',
            'biography' => 'required|string',
            'photo' => 'required|file|image',

        ]);

        $userphoto = $request->file('photo');
        $filename = time() . '.' . $userphoto->getClientOriginalExtension(); 
        $path = $userphoto->storeAs('usersphoto', $filename, 'public');



        $user = new User();
        $user -> name = $request -> input('name');
        $user -> password = $request -> input ('password');
        $user -> location = $request ->input('location');
        $user -> biography = $request ->input('biography');
        $user -> email = $request -> input('email');
        $user -> photo = asset('storage/'. $path);
        $user -> save();
       

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function login(Request $request)
    {
        
        $credentials = request(['email', 'password']);
        // auth()->attempt($credentials)
        if (!$token = '1234') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $user_id = $user->id;
        
        return response()->json([
            'message' => 'Login Successful!',
            'access_token' => $token,
            'user_id' => $user_id
        ], 200);
            

        return response()->json(['message' => 'Unauthorized'], 401);
    }

  /**
 * Log the user out (Invalidate the token).
 *
 * @return \Illuminate\Http\JsonResponse
 */
     public function logout()
        {
     auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
     }   
}