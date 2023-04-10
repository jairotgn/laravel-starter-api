<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{


    public function register(Request $request) {
        // get the recrest post, validate it and store it in the database
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // check if email exist
        $userExist = User::where('email', $request->email)->first();
        if ($userExist) {
            throw ValidationException::withMessages([
                'The provided email is already in use.',
            ]);
        }

        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($user) {
            return[
                'status' => 1
            ];
        }
    }

    public function index(Request $request) {
        $users = User::all();
        return $users;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'status' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token =  $user->createToken($user->id)->plainTextToken;

        return[
            'user' => $user->name,
            'email' => $user->email,
            'token' => $token
        ];
    }

    public function loginCheck (Request $request) {
        $user = $request->user();
        if ($user) {
            return ['status'=>1, 'message' => 'You are logged in as' ];
        } else {
            return ['status'=>0, 'message' => 'You are not logged in'];
        }

    }
}
