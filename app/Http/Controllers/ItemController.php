<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function show_all()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        $fields = $this->validateItem($request);

        $item = Item::create([
            'name' => $fields['name'],
            'value' => $fields['value'],
            'quality' => $fields['quality'],
            'category_id' => $fields['category_id'],
        ]);

        return response($item,201);

    }

    public function update(Request $request, $id)
    {
        $fields = $this->validateItem($request);

        $item = Item::find($id);

        if($item === null){
            return response('This item doesnt exist', 404);
        }

        $item->update([
            'name' => $fields['name'],
            'value' => $fields['value'],
            'quality' => $fields['quality'],
            'category_id' => $fields['category_id'],
        ]);

        return response($item,200);

    }

    public function validateItem(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|ends_with:_item',
            'value' => 'required|numeric|min:10|max:100',
            'quality' => 'required|integer|min:-10|max:50',
            'category_id' => 'required|exists:App\Models\Category,id'
        ]);
    }
}
