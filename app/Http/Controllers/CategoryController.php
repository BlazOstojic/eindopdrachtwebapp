<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($category_id = null)
    {
        $query = Company::query();

        
        if ($category_id !== null) {

            $query->where('category_id', $category_id);
        }

        $data = $query->get();
    

        return response()->json($data);
    }
        
        

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        
        $validatedData = $request->validate([

            'name' => 'required',
        ]);

        // Create a new instance of your model
        $category = new Category();

        $category->fill($validatedData);

        $category->save();

        $query = Category::query()->where('name', $validatedData['name']);

        $data = $query->get();
    
        return response()->json([$data]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category, $category_id)
    {
        $category = Category::find($category_id);
    
        if (!$category) {

            return response()->json(['message' => 'Record not found'], 404);
        }

        $category->update($request->all());

        $query = Category::query()->where('id', $category_id);

        $data = $query->get();

        return response()->json([$data, 'message' => 'Record updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, $id)
    {
        
        $category = Category::find($id);

        if (!$category) {

            return response()->json(['message' => 'Record not found'], 404);

        }

        $category->delete();

        return response()->json(['message' => 'Record deleted successfully']);



    }
}
