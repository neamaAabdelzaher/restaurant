@extends('layouts.parent')
@section('title','Meals') 
@section('content')

<div class="col-md-12">
   <div class="white_shd full margin_bottom_30">
      <div class="full graph_head">
         <div class="heading1 margin_0">
            <h2>Meals</h2>
         </div>
      </div>
      <div class="table_section padding_infor_info">
         <div class="table-responsive-sm">
       <table class="table">
          <thead>
             <tr>
             
                <th>meal name</th>
                <th>meal description</th>
                <th>price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
                
                
            
             </tr>
          </thead>
          <tbody>
            @foreach($meals as $meal)
             <tr>
                
                <td>{{$meal->name}}</td>
                <td>{{$meal->description}}</td>
                <td>{{$meal->price}}</td>
                <td>{{$meal->category->category_name}}</td>
                <td><img src="{{asset('assets/dashboard/images/'.$meal->image)}}" width="80" alt="{{$meal->name}}"> </td>
                <td>
                  <a href="{{route('dashboard.meals.edit',$meal->id)}}" >
                  <img src="{{asset('assets/dashboard/images/edit.png')}}" alt="Edit"> </a>
              </td>
              <td>
                  <a href="{{route('dashboard.meals.delete',$meal->id)}}" >
                  <img src="{{asset('assets/dashboard/images/delete.png')}}" alt="Delete"></a>
              </td>
             </tr>
             @endforeach
          </tbody>
       </table>
      </div>
   </div>
</div>

<div class="row">
   <div class="col-12">
     <div class="pagination">
       {{$meals->links()}}
     </div>
   </div>
 </div>
</div>
 
@endsection 