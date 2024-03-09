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
        $admin = Admin::where('email', $request->email)->first();
 
        if (!$admin || ! Hash::check($request->password, $admin->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid Email Or Password'],
            ]);
        }

        return $this->makeToken($admin);
    }

    public function logout(Request $request){
        // $request->user()->tokens()->delete();

        return $this->sendSuccessResponse(true, 'Admin Logout', 200);
    }

    public function user(Request $request){
        return AuthResource::make($request->user());
    }


    public function makeToken($admin){
        $token = $admin->createToken('seller-token')->plainTextToken;

        return AuthResource::make([
            'user' => [
                'name' => $admin->name,
                'email' => $admin->email,
                'phone' => $admin->phone,
            ],
            'token' => $token,
        ]);
    }
}
