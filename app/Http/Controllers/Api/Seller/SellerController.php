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
        $sellers = Seller::VerifiedSeller()->latest()->paginate(12);
        return SellerResource::collection($sellers);
    }
}
