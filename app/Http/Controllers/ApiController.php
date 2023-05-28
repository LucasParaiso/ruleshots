<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials))
            abort(401, 'E-mail ou Senha invalidos.');

        $token = auth()->user()->createToken('auth_token');

        return response()->json([
            'data' => [
                'token' => $token->plainTextToken
            ]
        ]);
    }
}
