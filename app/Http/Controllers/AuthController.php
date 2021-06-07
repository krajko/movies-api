<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function authenticate(Request $request) {
        $credentials  = $request->only(['email', 'password']);

        try {
            if (!$token = \JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch(JWTException $e) {
            return response()->json(['error' => 'could_not_create_token']. 500);
        }

        $user = User::where('email', $credentials['email'])->first();
        $name = $user['name'];

        return response()->json(compact('token', 'name'));
    }

    public function register(CreateUserRequest $request) {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }

    public function getUser($token) {
        return response()->json(auth()->user());
    }
}
