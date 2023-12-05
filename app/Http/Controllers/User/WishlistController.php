<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\WishlistResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index(){
        $wishlist = Auth::user()->wishlistProducts()->get();

        return WishlistResource::collection($wishlist);
    }

    public function store(Request $request){
        $user = Auth::user();

        $count = $user->wishlistProducts()->where('product_id', $request->product_id)->count();

        if($count == 0){
            $user->wishlistProducts()->attach($request->product_id);

            return sendMessage('Product Add To Wishlist Successful', true, 201);
        }else{
            $user->wishlistProducts()->detach($request->product_id);

            return sendMessage('Product Remove To Wishlist Successful', true, 200);
        }
    }
}
