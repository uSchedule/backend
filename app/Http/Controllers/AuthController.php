<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Authenticate an user.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:191',
            'password' => 'required|between:6,191'
        ]);

        $token = JWTAuth::attempt($request->only('email', 'password'));

        if ($token) {
            return response()->json([
                'token' => $token,
                'user' => Auth::user(),
            ]);
        }

        return response()->json(['message' => 'Email або пароль не існує.'], 401);
    }
}