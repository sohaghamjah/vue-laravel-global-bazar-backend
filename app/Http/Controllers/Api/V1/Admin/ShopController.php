<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProductResource;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request){
        try {
            $sort = $request->sort;

            if($sort == 'default'){
                $products = Product::paginate($request->show);
            }else{
                $products = Product::conditions($sort)->paginate($request->show);
            }
            return ProductResource::collection($products);

        } catch (\Throwable $e) {
            return sendMessage($e->getMessage(), false, 500);
        }
    }
}
