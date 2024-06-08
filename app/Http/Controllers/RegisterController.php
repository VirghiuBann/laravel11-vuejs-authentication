<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $validateData = $request->validated();

        $newUser = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => bcrypt($validateData['password']),
        ]);

        return response()->json([
            'user' => $newUser->only(['id', 'name', 'email']),
        ]);
    }

    public function login(Request $request)
    {
        return response()->json([
            'message' => 'login'
        ]);
    }

    public function logout(Request $request)
    {
        return response()->json([
            'message' => 'logout'
        ]);
    }

    public function getUser(Request $request)
    {
        return response()->json([
            'message' => 'getUser'
        ]);
    }
}
