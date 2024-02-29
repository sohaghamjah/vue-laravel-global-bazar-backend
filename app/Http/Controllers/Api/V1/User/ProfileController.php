<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\Http\Resources\User\AuthResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Http\Resources\User\OrderResource;
use App\Http\Requests\User\ProfileUpdateResource;
use App\Http\Requests\User\PasswordUpdateResource;

class ProfileController extends Controller
{
    public function getOrders(Request $request){
        $orders = Order::where('user_id', Auth::id())->with('items')->paginate(5);

        return OrderResource::collection($orders);
    }

    public function getOrderDetails($id){
        $order = Order::with('items.product')->find($id);

        return OrderResource::make($order);
    }

    public function profileUpdate(ProfileUpdateResource $request){
        $request->validated();
        Auth::user()->update($request->validated());
        return AuthResource::make(Auth::user());
    }

    public function passwordUpdate(PasswordUpdateResource $request){
        $user = Auth::user();
        
        if(!Hash::check($request->current_password, $user->password)) return sendMessage('Invalid Current Password', false, 500);

        Auth::user()->update(['password' => $request->password]);

        return sendMessage('Password Updated Successful', true, 200);
    }


    public function imagedUpdate(Request $request){
        if ($request->hasFile('image')) {
            $path = 'upload/user/';
            $requestImage = $request->file('image');
            $imgName =  $requestImage->hashName();
            Image::make($requestImage)->resize(300, 200)->save($path . $imgName);
            $pathName = $path . $imgName;

            //old image delte
            @unlink(public_path($request->user()->image));

            $user = Auth::user();

            $user->update([
                'image' => $pathName
            ]);

            return AuthResource::make($user);
        }
    }
}
