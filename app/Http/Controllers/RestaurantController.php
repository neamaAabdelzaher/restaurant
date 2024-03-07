<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $meals = Meal::all();
        return view('user_page', compact('meals', 'categories'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function filter(Request $request)
    {
        $categories = Category::all();
        $selectedValue = $request->category_id;
        if ($request->category_id) {
            $catName = Category::where('id', $selectedValue)->pluck('category_name')->first();
            $meals = Meal::where('Category_id', $selectedValue)->get();
            return view('user_page', compact('categories', 'meals', 'catName'));

        }




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
    public function show(string $id)
    {
        //    return dd($id);
        $meal = Meal::findOrFail($id);

        return view('meal_details', compact('meal'));
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
    public function update(Request $request, string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
