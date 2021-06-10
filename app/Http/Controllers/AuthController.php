<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials  = $request->only(['email', 'password']);

        $token = auth('api')->attempt($credentials);

        if (!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = auth('api')->user();

        return response()->json(compact('token', 'user'));
    }

    public function logout() {
        $result = auth('api')->logout();
        return response()->json(['success' => true]);
    }

    public function register(CreateUserRequest $request) {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }

    public function me() {
        return auth('api')->user();
    }

    public function refreshToken() {
        $token = auth('api')->refresh();
        return ['token' => $token];
    }
}
