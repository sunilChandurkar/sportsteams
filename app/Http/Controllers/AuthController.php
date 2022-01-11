<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // input validation
        // name, email & password
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return $user;
    }

    public function login(Request $request)
    {
        //input validation
        $validatedData = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string|min:5'
        ]);

        if(! $token = auth('api')->attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password']])){
            return response()->json([
                'message' => 'invalid email or password'
            ],401);
        }
        return $this->respondWithToken($token);
    }

    public function logout(Request $request)
    {
        auth('api')->logout();

        return response()->json([
            'message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
