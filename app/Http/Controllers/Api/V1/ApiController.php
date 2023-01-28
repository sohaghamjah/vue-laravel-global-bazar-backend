<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
   public function sendSuccessResponse($status,$message,$code)
    {
        $response = [
            'status' => $status,
            'message' => $message,
        ];
        return response()->json($response,$code);
    }
}
