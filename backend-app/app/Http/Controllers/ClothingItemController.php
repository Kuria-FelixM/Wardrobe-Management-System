<?php

namespace App\Http\Controllers;

use App\Models\clothingItem;
use Illuminate\Http\Request;

class ClothingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return clothingItem::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' =>'required|max:255',
            'brand' => 'required'
        ]);

        $clothingItem=clothingItem::create($fields);

        return  $clothingItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(clothingItem $clothingItem)
    {
        return  $clothingItem;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, clothingItem $clothingItem)
    {
        $fields = $request->validate([
            'title' =>'required|max:255',
            'brand' => 'required'
        ]);

        $clothingItem->update($fields);

        return  $clothingItem;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(clothingItem $clothingItem)
    {
        $clothingItem->delete();

        return ['message' => 'The post was deleted'];
    }
}
