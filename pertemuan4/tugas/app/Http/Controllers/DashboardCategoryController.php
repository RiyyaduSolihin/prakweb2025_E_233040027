<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class DashboardCategoryController extends Controller
{


public function store(Request $request){
    $data = $request->validate([
        'name' => 'required|max:255'
    ]);

    $data['slug'] = Str::slug($data['name']);

    Category::create($data);
    return redirect()->route('categories.index')->with('success','Category created!');
}

public function update(Request $request, Category $category){
    $data = $request->validate([
        'name' => 'required|max:255'
    ]);

    $data['slug'] = Str::slug($data['name']);

    $category->update($data);
    return redirect()->route('categories.index')->with('success','Category updated!');
}

    /**
     * 
     * 
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
