<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProductResource;
use App\Http\Resources\Admin\ShopSidebarResource;

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

    public function sidebarData(){
        $min_price = Product::published()->min('price');
        $max_price = Product::published()->max('price');

        $categories = Category::withCount('products')->status(1)->get();
        $brands = Brand::withCount('products')->status(1)->get();

        return ShopSidebarResource::collection([
            'categories' => $categories,
            'brands' => $brands,
            'price' => [
                'min_price' => $min_price,
                'max_price' => $max_price,
            ],
        ]);

    }
}
