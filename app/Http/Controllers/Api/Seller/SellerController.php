<?php

namespace App\Http\Controllers\Api\Seller;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Seller\SellerResource;

class SellerController extends Controller
{
    public function index(Request $request)
    {
        $sellers = Seller::VerifiedSeller()->withCount('products')->latest()->paginate($request->show);
        return SellerResource::collection($sellers);
    }

    public function sellerProducts($slug, Request $request){
        try {
            $seller = Seller::with('products')->where('slug',$slug)->first();

            $sort = $request->sort;

            if($sort == 'default'){
                $products = $seller->products()->paginate($request->show);
            }else{
                $products = $seller->products()->conditions($sort)->paginate($request->show);
            }
            return (new SellerResource($seller))
                    ->additional(['products' => $products]);
        } catch (\Throwable $e) {
            return sendMessage($e->getMessage(), false, 500);
        }
    }
}
