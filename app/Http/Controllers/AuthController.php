<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    function login(Request $request)
    {
        $this->ensureIsNotRateLimited($request);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            RateLimiter::hit($this->throttleKey($request), 40);

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

    protected function ensureIsNotRateLimited(Request $request)
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey($request), 4)) {
            throw ValidationException::withMessages([
                'throttle' => 'Too many login attempts. Please try again in ' . RateLimiter::availableIn($this->throttleKey($request)) . ' seconds.',
            ]);
        }
    }

    protected function throttleKey($request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
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

    function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'logout successful']);
    }
}
