<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\OrderResource;
use App\Models\Admin\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function placeOrder(Request $request){
       $user = Auth::user();
       $address = User::where('id', $user->id)->select('division_id','district_id','address')
            ->with(['division' => function($query){
                $query->select('id','name','charge');
            },'district' => function($query){
                $query->select('id','name');
            }]
        )->first();


        $order = Order::create([
            'user_id'          => $user->id,
            'order_number'     => mt_rand(100000, 999999),
            'shipping_address' => $address->division->name.', '.$address->district->name.', '.$address->address,
            'payment_type'     => 'cod',
            'subtotal'         => $request->sub_total,
            'discount'         => $request->discount,
            'charges'          => $address->division->charge,
            'total'            => $request->total,
            'status'           => true
        ]);

        foreach ($request->cart_items as $item) {
            $order->items()->create([
                'product_id' => $item['id'],
                'price'      => $item['price'],
                'qty'        => $item['quantity'],
            ]);
        }

        return OrderResource::make($order);
    }
}
