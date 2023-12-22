<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProductResource;
use App\Http\Resources\Admin\ShopSidebarResource;
use App\Models\Admin\SubCategory;

class ShopController extends Controller
{
    public function index(Request $request){
        try {
            $sort          = $request->sort;
            $per_page_data = $request->show;
            $brands_id     = $request->brands;
            $categories_slug = $request->categories;
            $price_range   = $request->price_range;
            $search_text   = $request->search_text;

            $products = Product::latest()
            ->active()
            ->when($sort != 'default', function($q) use ($sort) {
                $q->conditions($sort);
            })
            ->when($brands_id, function($q) use ($brands_id){
                $q->whereIn('brand_id', $brands_id);
            })
            ->when($categories_slug, function($q) use ($categories_slug){
                $categoryIds = Category::whereIn('slug', $categories_slug)->pluck('id')->toArray();

                if(count($categoryIds) > 0){
                    $q->whereIn('category_id', $categoryIds);
                }else{
                    $sub_categoryIds = SubCategory::whereIn('slug', $categories_slug)->pluck('id')->toArray();
                    $q->whereIn('sub_category_id', $sub_categoryIds);
                }

            })
            ->when($price_range, function($q) use ($price_range){
                $min_price = $price_range[0];
                $max_price = $price_range[1];
                $q->whereBetween('price', [$min_price, $max_price]);
            })
            ->when($search_text != '', function($q) use ($search_text){
                $q->where('name', 'LIKE', '%'.$search_text.'%');
                $q->orWhere('descp', 'LIKE', '%'.$search_text.'%');
            })
            ->paginate($per_page_data);


            return ProductResource::collection($products);

        } catch (\Throwable $e) {
            return sendMessage($e->getMessage(), false, 500);
        }
    }

    public function sidebarData(){
        $min_price = Product::min('price');
        $max_price = Product::max('price');

        $categories = Category::withCount('products')->orderBy('name', 'desc')->status(1)->get();
        $categories = $categories->where('products_count', '>', 0);
        $brands = Brand::withCount('products')->orderBy('name', 'desc')->status(1)->get();
        $brands = $brands->where('products_count', '>', 0);

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
