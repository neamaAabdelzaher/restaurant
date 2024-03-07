<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Category;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    



    public function index(){
        $categories=Category::all();
        $meals=Meal::all();
        return view('visitor-page',compact('categories','meals'));
       
    }

    public function filter(Request $request)
    {  
        $categories=Category::all();
        $selectedValue = $request->category_id;
        if($request->category_id){
        $catName=Category::where('id',$selectedValue)->pluck('category_name')->first();
        $meals=Meal::where('Category_id',$selectedValue)->get();
        return view('visitor-page',compact('categories','meals','catName'));
        
    }
       
    }
}