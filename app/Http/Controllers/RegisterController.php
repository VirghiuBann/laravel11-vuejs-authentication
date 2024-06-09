<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'guest'
        ];
    }

    public function register(RegisterRequest $request)
    {

        $validateData = $request->validated();

        $newUser = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => bcrypt($validateData['password']),
        ]);

        Auth::login($newUser);

        $user = Auth::user()->only(['id', 'email', 'name']);

        return response()
            ->json([
                'user' => $user,
                'isAuth' => true
            ]);
    }
}
