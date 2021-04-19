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
        return Category::find($id)->items;
    }

    public function validateCategory(Request $request): array
    {
        return $request->validate([
           'name' => 'required|string|min:5',
        ]);
    }


}
