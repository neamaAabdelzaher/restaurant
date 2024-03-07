
@extends('layouts.parent')
@section('title','Add Category')

@section('content')



<div class="col-sm-12 col-xl-12">
    <h3 class="m-4">Add Category</h3>

    <div class="bg-light  h-100 p-4">
        <form method="post" action="{{route('dashboard.categories.store')}}" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
                <label for="category_name" class="form-label text-dark"  >Category Name</label>
                <input type="text" name="category_name" placeholder="Category Name " class="form-control" value="{{old('category_name')}}" id="category_name">
                
            </div>
            @error('category_name')
            <div class="alert alert-warning">{{ $message }}</div>
        @enderror
       
            
            <button type="submit"  class="btn btn-primary"> Add </button>
        </form>
    </div>
</div>

@endsection