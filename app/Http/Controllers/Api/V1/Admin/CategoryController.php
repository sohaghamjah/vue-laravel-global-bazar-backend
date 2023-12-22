<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::with(['subcategories'])->withCount('products')->status(1)->orderBy('name', 'ASC')->paginate(10);
        $cats = $cats->where('products_count', '>', 0);
        return  CategoryResource::collection($cats);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function navCategories()
    {
        $cats = Category::with(['subcategories'])->withCount('products')->status(1)->orderBy('name', 'ASC')->get();
        $cats = $cats->where('products_count', '>', 0);
        return  CategoryResource::collection($cats);
    }

}
