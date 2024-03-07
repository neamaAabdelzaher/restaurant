<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $meals = Meal::paginate(5);
        return view('Dashboard.meals.index', compact('meals'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('Dashboard.meals.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $meals = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:3|max:500',
            'price' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|integer|exists:categories,id',



        ]);

        // upload image
        $image = $request->file('image');
        $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->image->move('assets/dashboard/images', $imageName);
        $meals['image'] = $imageName;
        Meal::create($meals);

        $notification = array(
            'message_id' => 'meals Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard.meals.index')->with($notification);

        // return redirect()->route('dashboard.meals.index')->with('success','Success Operation');

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
        $meal = Meal::findOrFail($id);
        $categories = Category::select('id', 'category_name')->get();
        return view('Dashboard.meals.edit', compact('meal', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $meals = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:3|max:500',
            'price' => 'required|numeric',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|integer|exists:categories,id',



        ]);

    
       
        $image = $request->file('image');

        if ($request->hasFile('image')) {
            // delete old image
            $meal=Meal::findOrFail($id);
            $oldImage=$meal->image;
            $path="assets/dashboard/images/{$oldImage}";
            
            $oldFilePath=public_path($path);
            if(file_exists($oldFilePath)){
                unlink($oldFilePath);
           
            $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $request->image->move('assets/dashboard/images', $imageName);
            $meals['image'] = $imageName;
        }
    }
        Meal::where('id',$id)->update($meals);

        $notification = array(
            'message_id' => 'meal Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard.meals.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orders=Order::where('meal_id',$id)->get()->count();
       if($orders == 0){
        $meal=Meal::findOrFail($id);
        $oldImage=$meal->image;
        $path="assets/dashboard/images/{$oldImage}";
        
        $oldFilePath=public_path($path);
        if(file_exists($oldFilePath)){
            unlink($oldFilePath);
         }
         $meal->where('id',$id)->delete();
         
        $notification = array(
            'message_id' => 'meal Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard.meals.index')->with($notification);

       }
        else{
            $notification = array(
                'message_id' => 'This meal has orders,Can not be deleted!!',
                'alert-type' => 'error'
            );
    
            return redirect()->route('dashboard.meals.index')->with($notification);
        }
    }
}
