<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProductResource;

class ProductController extends Controller
{

    public function productBySlug(Product $slug)
    {
        return ProductResource::make($slug);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $limit = 10;
            if ($request->conditions == null) {
                $products = Product::paginate($limit);
            }elseif ($request->conditions === 'sale') {
                $products = Product::sold()->paginate($limit);
            }else {
                $products = Product::conditions($request->conditions)->paginate($limit);
            }
            return  ProductResource::collection($products);
        } catch (\Exception $e) {
            return sendMessage($e->getMessage(), false, 500);
        }
    }

    public function productDetails($slug){
       $product = Product::where('slug', $slug)->first();

       return ProductResource::make($product);
    }
}
