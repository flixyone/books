<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::get();
        return response()->json(['categories' => $categories], 200);
    }

    public function create()
    {
        //
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category($request->all());
        $category->save();
        return response()->json(['status' => 'Category Created', 'category' => $category], 201);
    }

    public function show(Request $request, Category $category)
    {
        return response()->json(['Category' => $category], 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return response()->json([], 204);
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();
        return response()->json([], 204);
    }
}
