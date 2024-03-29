<?php

namespace App\Http\Controllers\Api\V1\Seller;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\LoginRequest;
use App\Http\Resources\Seller\AuthResource;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends ApiController
{
    public function login(LoginRequest $request){
        $user = Seller::where('email', $request->email)->first(); 
 
        if (!$user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid Email Or Password'],
            ]);
        }

        return $this->makeToken($user);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return $this->sendSuccessResponse(true, 'Seller Logout', 200);
    }

    public function user(Request $request){
        return AuthResource::make($request->user());
    }


    public function makeToken($user){
        $token = $user->createToken('seller-token')->plainTextToken;

        return AuthResource::make([
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
            ],
            'token' => $token,
        ]);
    }
}
