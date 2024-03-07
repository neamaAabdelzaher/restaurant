<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orders=Order::all();
        return view('Dashboard.admin-page',compact('orders'));
        // return view('Dashboard.admin-page');
    }

}
