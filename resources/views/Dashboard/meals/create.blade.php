@extends('layouts.parent')
@section('title', 'Add Meal')
@section('content')
    <div class="col-sm-12 col-xl-12">

        <div class="bg-light  h-100 p-4">
        <h3 class="m-4 bg-primary border rounded text-center">Add Meal</h3>

            <form method="post" action="{{ route('dashboard.meals.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- name --}}
                <div class="mb-3">
                    <label for="meal_name" class="form-label text-dark">Meal Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Meal Name "
                        class="form-control" id="meal_name">

                </div>
                @error('name')
                    <div class="alert alert-warning">{{ $message }}</div>
                @enderror
                {{-- description --}}
                <div class="mb-3">
                    <label for="meal_description" class="form-label text-dark">Meal Description</label>

                    <textarea class="form-control" id="meal_description" name="description" rows="5">{{ old('description') }}</textarea>

                </div>
                @error('description')
                    <div class="alert alert-warning">{{ $message }}</div>
                @enderror
                {{-- price --}}
                <div class="mb-3">
                    <label for="meal_price" class="form-label text-dark">Meal Price</label>
                    <input type="number" name="price" value="{{ old('price') }}" placeholder="Meal Price "
                        class="form-control" id="meal_price">

                </div>
                @error('price')
                    <div class="alert alert-warning">{{ $message }}</div>
                @enderror
                {{-- image --}}


                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div >
                    <img width="100px" height="100px"  id="imageShow" src="{{asset('assets/dashboard/images/No-Image-Placeholder.svg.png')}}" alt="meal image">
                </div>
                @error('image')
                    <div class="alert alert-warning">{{ $message }}</div>
                @enderror



                {{-- categories --}}

                <div class="form-group">
                    <label for="cat_id">Category<span class="text-danger">*</span></label>
                    
                    <div class="controls">
                        <select  name="category_id"  id="cat_id" class="form-group" aria-label="Default select example">
                            <option disabled selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                    {{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('category_id')
                    <div class="alert alert-warning mt-1">
                        {{ $message }}
                    </div>
                @enderror




               <div class="form-group text-center mb-5">
                <button type="submit" class="btn btn-primary"> Add </button>
               </div>
            </form>
        </div>
    </div>

@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('input[type="file"]').change(function(e) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#imageShow').attr('src', e.target.result);
        };

        reader.readAsDataURL(this.files[0]); // Read the selected image file
    });
});
</script>
@endsection