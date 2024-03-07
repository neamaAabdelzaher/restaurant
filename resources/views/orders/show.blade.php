@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
      <div class="card">
         <div class="card-header text-center bg-success text-light"> your orders</div>
       <div class="table_section padding_infor_info">
          <div class="table-responsive-sm card-body">
        <table class="table ">
           <thead>
              <tr>
                <th>Name</th>
                <th>phone</th>
                <th>email</th>
                <th>date</th>
                <th>time</th>
                <th>meal name</th>
                <th>meal price</th>
                <th>quantity</th>
                <th>Total Price</th>
                <th>address</th>
                <th>status</th>

                 
             
              </tr>
           </thead>
           <tbody>
           
               
            <tr>
               @if($orders->count()>0)
               @foreach ($orders as $order)
              
               <td>{{$order->user->name}}</td>
               <td>{{$order->phone}}</td>
               <td>{{$order->user->email}}</td>
               <td>{{$order->date}}</td>
               <td>{{$order->time}}</td>
               <td>{{$order->meal->name}}</td>
               <td>{{$order->meal->price}}</td>
               <td>{{$order->quantity}}</td>
               <td>{{$order->meal->price*$order->quantity}}</td>
               <td>{{$order->address}}</td>
               <td class="@if($order->status=="refuse") text-light bg-danger @elseif($order->status=="accept") text-light bg-success @elseif($order->status=="finished") text-light bg-info @elseif($order->status=="waiting") text-light bg-dark @endif"> {{$order->status}}</td>
              @endforeach
              
               @else
              <td colspan="11" class="text-center text-info fs-5">No Orders</td>
            </tr>
           
            @endif

           </tbody>
        </table>
       </div>
    </div>
 </div>


@endsection