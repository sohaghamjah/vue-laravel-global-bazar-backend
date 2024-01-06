<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Requests\User\AddressRequest;
use App\Http\Requests\User\LoginRequest;
use App\Http\Resources\User\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Resources\User\WishlistResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    public function login(LoginRequest $request){
        $user = User::where('phone', $request->phone)->first();
 
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'phone' => ['Phone or password dosen\'t match.'],
            ]);
        }

        return $this->makeToken($user);
    }

    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        return $this->makeToken($user);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return $this->sendSuccessResponse(true, 'User Logout', 200);
    }

    public function user(Request $request){
        return AuthResource::make($request->user());
    }

    public function addressStore(AddressRequest $request){

        $request->validated();
        Auth::user()->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'address'     => $request->address,
        ]);

        return sendMessage('Address Store Successful', true, 201);
    }

    public function getAddress(){
        $user = Auth::user();
        $address = User::where('id', $user->id)->select('division_id','district_id','address')
            ->with(['division' => function($query){
                $query->select('id','name','charge');
            },'district' => function($query){
                $query->select('id','name');
            }]
        )->first();

        return WishlistResource::make($address);
    }

    public function makeToken($user){
        $token = $user->createToken('user-token')->plainTextToken;

        $wishlists = $user->wishlistProducts()->get();

        return AuthResource::make($user)->additional([
            'meta' => [
                'token'      => $token,
                'token_type' => 'Bearer',
                'wishlists' =>  $wishlists,
            ]
        ]);
    }
}
