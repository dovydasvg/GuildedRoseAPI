<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show_all()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $fields = $this->validateCategory($request);

        $Category = Category::create([
            'name' => $fields['name'],
        ]);

        return response($Category,201);

    }

    public function show_category_items($id)
    {
        $category = Category::find($id);

        if($category === null){
            return response('Category not found',404);
        }
        return $category->items;
    }

    public function delete_category_items($id)
    {
        $category = Category::find($id);

        if($category === null){
            return response('Category not found',404);
        }

        return response(($category->items()->delete()).' items deleted.',200);

    }

    public function validateCategory(Request $request): array
    {
        return $request->validate([
           'name' => 'required|string|min:5',
        ]);
    }



}
