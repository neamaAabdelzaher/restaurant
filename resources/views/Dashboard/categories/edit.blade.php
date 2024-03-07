
@extends('layouts.parent')
@section('title','Edit category')

@section('content')



<div class="col-sm-12 col-xl-12">
    <h3 class="m-4">Edit Category</h3>

    <div class="bg-light  h-100 p-4">
        <form method="post" action="{{route('dashboard.categories.update',$category->id)}}" enctype="multipart/form-data" >
            
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="category_name" class="form-label text-dark"  >Category Name</label>
                <input type="text" name="category_name" value="{{$category->category_name}}" placeholder="Category Name " class="form-control" id="category_name">
                
            </div>
            @error('category_name')
            <div class="alert alert-warning">{{ $message }}</div>
        @enderror
       
            
            <button type="submit"  class="btn btn-primary"> Edit </button>
        </form>
    </div>
</div>

@endsection