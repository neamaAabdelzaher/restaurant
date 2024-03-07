@extends('layouts.parent')
@section('title','Categories')
@section('css')

@endsection
@section('content')

  <!-- table section -->
  <div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
       <div class="full graph_head">
          <div class="heading1 margin_0">
            <h2>meals categories</h2>
          </div>
       </div>
       <div class="table_section padding_infor_info">
        @include('includes.message')
          <div class="table-responsive-sm">
             <table class="table">
                <thead>
                   <tr>
                    
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                   </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $key=> $category)
                      
                  
                   <tr>
                      <td>{{$key=$key+1}}</td>
                      <td>{{$category->category_name}}</td>
                      <td>
                        <a class="btn btn-success" href="{{route('dashboard.categories.edit',$category->id)}}" data-toggle="tooltip" data-placement="left" title="" data-original-title="Left">Edit</a>
                      </td>
                      <td>
                        <a class="btn btn-danger" id="delete" href="{{route('dashboard.categories.delete',$category->id)}}" data-toggle="tooltip" data-placement="left" title="" data-original-title="Left">Delete</a>
                      </td>
                      @endforeach
                   </tr>
                
                </tbody>
             </table>
          </div>
       </div>
    </div>
 </div>
 <!-- table section -->

   
@endsection

@section('js')

@endsection