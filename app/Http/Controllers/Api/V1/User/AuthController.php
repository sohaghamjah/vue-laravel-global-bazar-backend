<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Requests\User\LoginRequest;
use App\Http\Resources\User\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\User\RegisterRequest;

class AuthController extends ApiController
{
    public function login(LoginRequest $request){
        $user = User::where('phone', $request->phone)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'phone' => ['Phone or password dosen\' match.'],
            ]);
        }

        return $this->makeToken($user);
    }

    public function register(RegisterRequest $request){
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return $this->makeToken($user);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return $this->sendSuccessResponse(false, 'User Logout', 200);
    }

    public function user(Request $request){
        return AuthResource::make($request->user());
    }


    public function makeToken($user){
        $token = $user->createToken('user-token')->plainTextToken;

        return AuthResource::make($user)->additional([
            'meta' => [
                'token'      => $token,
                'token_type' => 'Bearer',
            ]
        ]);
    }
}
