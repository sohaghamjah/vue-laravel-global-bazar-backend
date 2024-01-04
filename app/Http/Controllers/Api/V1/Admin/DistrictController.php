<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\DistrictResource;
use App\Models\Admin\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function districtById($division_id)
    {
        $districts = District::where('division_id', $division_id)->get(['bn_name', 'name', 'id']);
        return DistrictResource::collection($districts);
    }
}
