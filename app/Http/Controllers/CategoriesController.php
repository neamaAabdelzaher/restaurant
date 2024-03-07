<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $categories=Category::get();
     return view('Dashboard.categories.index',compact('categories'));
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoriesData=$request->validate([
            'category_name'=>'required|string|unique:categories|min:3|max:40'
        ]);

        Category::create($categoriesData);

        return  redirect()->route('dashboard.categories.index')->with('success','Success Operation');
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
    public function edit(string $id)
    {
        $category=Category::findOrFail($id);

        return view('Dashboard.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoriesData=$request->validate([
            'category_name'=>'required|string|unique:categories|min:3|max:40'
        ]);

        Category::where('id',$id)->update($categoriesData);

        return  redirect()->route('dashboard.categories.index')->with('success','Success Operation');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $meals=Meal::where('category_id',$id)->get()->count();
        if( $meals > 0){

         return  redirect()->route('dashboard.categories.index')->with('success','This Category Contains Meals!');
        
        }
        
        else{
            Category::where('id',$id)->delete();
        return  redirect()->route('dashboard.categories.index')->with('success','Success Operation');

        }
       

    }
}
