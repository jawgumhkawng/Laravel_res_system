<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $categories = Category::all();

        return view("kitchen.category", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {   
        return view('kitchen.category_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
         $Categories = new Category();
        $Categories->name = $request->name;
        $Categories->description = $request->description;

        
        $Categories->save();

        return redirect('category')->with('Created', 'Category Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
         return view('kitchen.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
      public function update(Request $request, Category $category)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category->name = $request->name;
        $category->description = $request->description;

       
        $category->save();

        return redirect('category')->with('Updated', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('category')->with('Deleted', 'Category Removed Successfully!');
    }
}