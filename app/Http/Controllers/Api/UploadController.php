<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadSingleImg(Request $request)
    {
        if ($request->has('image')) {
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('product-img', $imageName);
        }

        return response()->json(['message' => 'Image Uploaded']);
    }

    public function uploadMultipleImg(Request $request)
    {
        if ($request->has('image')) {
            $images = $request->image;
            foreach ($images as $image) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('product-img', $imageName);
            }
        }

        return response()->json(['message' => 'Images Uploaded']);
    }
}
