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
        $this->validate($request);

        $Category = Category::create([
            'name' => $request->name,
        ]);

        return response($Category,201);

    }

    private function validate(Request $request)
    {
        $request->validate([
           'name' => 'required|string|min:5',
        ]);
    }


}
