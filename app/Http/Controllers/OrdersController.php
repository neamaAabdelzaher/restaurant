<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {   $orders=Order::all();
        return view('Dashboard.orders.index',compact('orders'));
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
    public function store(Request $request )
    {

       $order=$request->validate(
        [
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'quantity' => 'integer',
            'address' => 'required|min:10|max:100',
        ]
        );
        $order['meal_id']=$request->meal_id;
        $order['status']="waiting";
        $order['user_id']=auth()->user()->id;



        Order::create( $order);


 
        $notification = array(
            'message_id' => 'order Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('restaurant.index')->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $orders=Order::where('user_id',auth()->user()->id)->get();
        return view('orders.show',compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function orderStatus(Request $request ,string $id)
    {
       $order=Order::findOrFail($id);
       $status= $request->status;

    //    return dd($status);

    Order::where('id',$id)->update(['status'=>$status]);
    return back();


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
