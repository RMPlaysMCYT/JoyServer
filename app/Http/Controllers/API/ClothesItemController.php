<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClothesItem;

class ClothesItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clothesItems = ClothesItem::all();
        return response()->json($clothesItems, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sku' => 'required',
            'image' => 'required|url',
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $clothesItem = ClothesItem::create($validatedData);

        return response()->json($clothesItem, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clothesItem = ClothesItem::find($id);
        if (!$clothesItem) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        return response()->json($clothesItem, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $clothesItem = ClothesItem::find($id);
        if(!$clothesItem){
            return response()->json(['message' => 'Item not found'], 404);
        }
        $validated = $request->validate([
            'sku' => 'required',
            'image' => 'required|url',
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);
        $clothesItem->update($validated);
        return response()->json([
            'message' => 'Item updated successfully',
            'item' => $clothesItem
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clothesItem = ClothesItem::find($id);
        if (!$clothesItem){
            return response()->json(['message'=>'Item Not Found'], 404);
        }
        $clothesItem->delete();
        return response()->json(['message'=>'Item Deleted Successfully'], 200);
    }
}
