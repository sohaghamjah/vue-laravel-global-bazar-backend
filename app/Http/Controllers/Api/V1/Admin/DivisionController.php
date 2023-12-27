<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Division;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\DivisionResource;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::get(['bn_name', 'name', 'id']);
        return DivisionResource::collection($divisions);
    }
}
