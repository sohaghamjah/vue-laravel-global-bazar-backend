<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\OrderResource;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
