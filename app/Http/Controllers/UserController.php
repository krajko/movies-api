<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(CreateUserRequest $request) {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }
}
