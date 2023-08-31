<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponser;

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        if (isset($request->image)) {
            $user->addMedia($request->image)->toMediaCollection('user.images');
        }

        return $this->success('User Created', [
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken,
        ]);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (! Auth::attempt($data)) {
            return $this->error('Credentials not match', 401);
        }

        return $this->success('Successfully Logged In', [
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('API Token')->plainTextToken,
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked',
        ];
    }
}
