@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center bg-success text-light">
                        <h5>Filter</h5>
                        
                      </div>
                      <div class="card-body">
                          <a class="btn border border-secondary mb-2 justify-content-end " href="{{route('visitorPage')}}">All Meals</a>
                          <form id="myForm" action="{{route('filter')}}" method="post">
                              @csrf
                              <div class="form-group">
                                  <label class="mb-2" for="cat_id">By Category:</label>
                                 
                                  <div class="controls">
                                      <select id="mySelect"  name="category_id"  id="cat_id" class="form-group p-2" aria-label="Default select example">
                                          <option disabled selected>Select Category</option>
                                          @foreach ($categories as $category)
                                              <option value="{{ $category->id }}" >
                                                  {{ $category->category_name }}</option>
                                              
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                      </form>
                      </div>


                </div>
                @if(Auth::check())
                <div class="card mt-5">
                    <div class="card-header text-center bg-success text-light">
                      <h5>Your orders</h5>
                      
                    </div>
                    <div class="card-body ">
                        <a class="btn border border-secondary mb-2 justify-content-end " href="{{route('restaurant.show')}}">show orders</a>
                     
                    </div>


                </div>
                @endif
            </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-success text-light">
                    
                        @isset($catName)
                        <h5> {{$catName}}</h5>
                    @endisset
                    <h5> meals Numbers ({{count($meals)}})</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($meals as $meal)
                            
                            <div class="col-md-4 text-center mt-2 p-2" style="border: 1px solid rgb(204, 208, 216)">
                            <img src="{{asset('assets/dashboard/images/'.$meal->image)}}" class="img-thumbnail w-100"  alt="{{$meal->name}}">
                                <strong>{{$meal->name}}</strong>
                                <p>{{$meal->description}}</p>
                                <div class="form-group text-center">
                                    <a href="{{route('restaurant.meal-details',$meal->id)}}" class="btn btn-success">Order Now</a>
                                   </div>
                            </div>
                            
                            @empty
                           <p class="text-center fs-3 ">No Meals Avilable</p>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

<script>
document.getElementById('mySelect').addEventListener('change', function() {
    document.getElementById('myForm').submit();
});
</script>

@endsection