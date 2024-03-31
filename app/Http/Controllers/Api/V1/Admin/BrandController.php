<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\BrandResource;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request){
        $perPage = $request->perPage ?? 25;
        $searchData = $request->searchData;
        $brands = Brand::latest()
                        ->when($searchData, function($q) use ($searchData){
                            $q->where('name', 'LIKE', '%'.$searchData.'%');
                        })
                        ->paginate($perPage);
        return BrandResource::collection($brands);
    }
}
