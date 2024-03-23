<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FileManagerResource;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class FileManagerController extends Controller
{

    public function index(){
        $admin = Auth::user();
        $files = $admin->files()->latest()->paginate(24);
        return FileManagerResource::collection($files);
    }

    public function upload(Request $request){

        if($request->hasFile('file')){
            $image = $request->file('file');
            $imageName = $image->hashName();
            $path = 'upload/files/';
            Image::make($image)->resize(450,450)->save($path. $imageName);
        }

        $admin = Auth::user();

        $admin->files()->create([
            'file_original_name' => $image->getClientOriginalName(),
            'file_name'          => $path.$imageName,
            'extension'          => $image->getClientOriginalExtension(),
            'file_size'          => $image->getSize(),
        ]);

        return sendMessage('Upload Success', true, 200);
    }
}
