<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        // VALIDATE
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        // GET CREDENTIALS
        $credentials = $request->only('email', 'password');

        // TRY LOGIN
        if (Auth::attempt($credentials)) {

            // GET CURRENT USER
            $user = Auth::user();

            // GENERATE TOKEN
            $token = $request->user()->createToken('spa');


            return response()->json([   'status'=> 1,
                                        'message' => 'Login successful',
                                        'name' => $user->name,
                                        'roleId' => 1,
                                        'token' => $token->plainTextToken]
                                        , 200);
        } else {
            return response()->json(['status'=> 0, 'message' => 'Failed: Wrong email or password'], 401);
        }
    }
}
