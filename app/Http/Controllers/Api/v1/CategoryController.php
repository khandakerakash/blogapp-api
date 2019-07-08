<?php

namespace App\Http\Controllers\Api\v1;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //Show All Category Function
    public function index()
    {
//        return Category::all();
        $categories = Category::latest()
                        ->orderBy('id', 'desc')
                        ->get();

        return response()->json($categories, 200);
    }

    //Show a Single Category Function
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category, 200);
    }

    //Store a Category Function
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $category = Category::create($validatedData);

        return response()->json($category, 201);

    }

    //Update a Category Function
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $category = Category::whereId($id)->update($validatedData);

        return response()->json($category, 200);

    }

    //Delete a Category Function
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }
}
