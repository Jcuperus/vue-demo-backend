<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\User;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('userAuth');

            return response()->json([
                'accessToken' => $token->accessToken,
                'user' => $user
            ]);

            return $token->accessToken;
        }
        return response('authentication failed', 401);
    }

    public function authenticate()
    {
        return Auth::user();
    }
}
