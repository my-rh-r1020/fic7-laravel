<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        // $this->authorize(Category::class, 'category');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create([
            ...$request->validate([
                'name' => 'required|string|min:3|max:25',
                'description' => 'required|min:5'
            ])
        ]);

        return $category;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // Display category with list products
        return $category->load('products');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update(
            $request->validate([
                'name' => 'required|string|min:3|max:25',
                'description' => 'required|min:5'
            ])
        );

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response(status: 204);
    }
}
