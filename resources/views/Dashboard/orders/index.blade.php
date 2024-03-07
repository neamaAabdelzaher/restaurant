@extends('layouts.parent')
@section('title','Orders') 
@section('content')

<div class="col-md-12">
   <div class="white_shd full margin_bottom_30">
      <div class="full graph_head">
         <div class="heading1 margin_0">
            <h2>Orders</h2>
         </div>
      </div>
      <div class="table_section padding_infor_info">
         <div class="table-responsive-sm">
       <table class="table">
          <thead>
             <tr>
             
                <th>Name</th>
                <th>phone</th>
                <th>email</th>
                <th>date</th>
                <th>time</th>
                <th>meal name</th>
                <th>quantity</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>address</th>
                <th>status</th>
                <th>Accept Orde </th>
                <th>Refuse Order</th>
                <th>Order Finish?</th>
             </tr>
          </thead>
          <tbody>
             <tr>
               @foreach ($orders as $order)
                <td>{{$order->user->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->user->email}}</td>
                <td>{{$order->date}}</td>
                <td>{{$order->time}}</td>
                <td>{{$order->meal->name}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->meal->price}}</td>
                <td>{{$order->meal->price*$order->quantity}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->status}}</td>
                <form action="{{route('dashboard.orders.status',$order->id)}}" method="POST">
                  @csrf
                  @method('patch')
                <td>
                  <input type="submit" name="status" value="accept" class="btn btn-primary">
                </td>
                <td>
                  <input type="submit" name="status" value="refuse" class="btn btn-danger">
                </td>
                
                <td>
                  <input type="submit" name="status" value="finished" class="btn btn-success">
                </td>
               </form>
             </tr>
             @endforeach
          </tbody>
       </table>
      </div>
   </div>
</div>
</div>
 
@endsection 