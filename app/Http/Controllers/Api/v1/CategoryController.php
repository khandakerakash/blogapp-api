<?php

namespace App\Http\Controllers\Api\v1;

use App\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    use ApiResponse;

    //Show All Category Function
    public function index()
    {
        $categories = Category::all();
        return $this->showAll($categories);
    }

    //Show a Single Category Function
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return $this->showOne($category);
    }

    //Store a Category Function
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $data = $request->all();
        $category = Category::create($data);

        return $this->showOne($category);

    }

    //Update a Category Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $data = $request->all();

        $category = Category::findOrFail($id);

        $category->update($data);

        return $this->showMessage("Update successfully");

    }

    //Delete a Category Function
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return $this->showMessage("Delete successfully");
    }
}
