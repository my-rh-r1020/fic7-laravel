<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return $products;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:5',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'image_url' => 'required|image|mimes:jpeg,png,jpg|max:1024'
        ]);

        if ($imageurl = $request->file('image_url')) {
            $imageName = date('YmdHis') . "." . $imageurl->getClientOriginalExtension();
            $imageurl->storeAs('product-img', $imageName);
            $data['image_url'] = $imageName;
        }

        $data['user_id'] = 1;

        return Product::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('category', 'user');

        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:5',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'image_url' => 'required|image|mimes:jpeg,png,jpg|max:1024'
        ]);

        if ($imageurl = $request->file('image_url')) {
            $imageName = date('YmdHis') . "." . $imageurl->getClientOriginalExtension();
            $imageurl->storeAs('product-img', $imageName);
            $data['image_url'] = $imageName;
        } else {
            unset($data['image_url']);
        }

        $data['user_id'] = 1;

        return $product->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image_url) {
            Storage::delete('product-img', $product->image_url);
            $product->delete();
        }

        return response(status: 204);
    }
}
