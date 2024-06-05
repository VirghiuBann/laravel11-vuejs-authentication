<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return response()->json([
            'message' => 'Register'
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
