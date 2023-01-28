<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Resources\Admin\AuthResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends ApiController
{
    public function login(LoginRequest $request){
        $user = Admin::where('phone', $request->phone)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'phone' => ['Phone or password dosen\' match.'],
            ]);
        }

        return $this->makeToken($user);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return $this->sendSuccessResponse(false, 'Admin Logout', 200);
    }

    public function user(Request $request){
        return AuthResource::make($request->user());
    }


    public function makeToken($user){
        $token = $user->createToken('seller-token')->plainTextToken;

        return AuthResource::make($user)->additional([
            'meta' => [
                'token'      => $token,
                'token_type' => 'Bearer',
            ]
        ]);
    }
}
