<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $request->session()->regenerate();

        $user = Auth::user()->only(['id', 'email', 'name']);

        return response()
            ->json([
                'user' => $user,
                'isAuth' => true
            ]);
    }


    function getUser()
    {
        $user = Auth::user()->only(['id', 'email', 'name']);
        return response()
            ->json([
                'user' => $user,
                'isAuth' => true
            ]);
    }
}
