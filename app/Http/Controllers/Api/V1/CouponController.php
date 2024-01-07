<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\CouponResource;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function applyCoupon(Request $request){
        $coupon = Coupon::where("code", $request->coupon_code)->where('status', 1)->select('code','value', 'type')->first();

        if($coupon){
            return CouponResource::make($coupon);
        }else{
            return sendMessage("invalid Coupon Code", false, 404);
        }
    }
}
