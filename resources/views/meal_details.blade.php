@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-success text-light"> The Meal</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <h4>
                                    <strong style="color:rgb(10, 167, 101);">meal category:
                                   </strong> {{$meal->category->category_name}}
                                </h4>
                            </p>
                            <p>
                                <h4>
                                    <strong style="color:rgb(10, 167, 101);">meal name:
                                   </strong> {{$meal->name}}
                                </h4>
                            </p>
                            <p>
                                <h4>
                                    <strong style="color:rgb(10, 167, 101);">meal price:
                                   </strong> {{$meal->price}}
                                </h4>
                            </p>
                            <p>
                                <h4>
                                    <strong style="color:rgb(10, 167, 101);">meal description:
                                   </strong> {{$meal->description}}
                                </h4>
                            </p>
                        </div>
                        <div class="col-md-6">

                    <img src="{{asset('assets/dashboard/images/'.$meal->image)}}" width="350px" alt="{{$meal->name}}">

                        </div>
                       
                    </div>





                </div>


            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center bg-success text-light">Order Information</div>
                <div class="card-body">
                    @if (Auth::check())
                      
                     <form action="{{route('restaurant.store')}}" method="post">
                        @csrf
                        <p>
                            
                                <strong style="color:rgb(10, 167, 101);">user name:
                               </strong> {{auth()->user()->name}}
                            
                        </p>
                        <p>
                            
                                <strong style="color:rgb(10, 167, 101);">user email:
                               </strong> {{auth()->user()->email}}
                            
                        </p>
                        <p>
                            <input hidden type="number" name="meal_id" value="{{$meal->id}}">
                                <strong style="color:rgb(10, 167, 101);">phone:
                               </strong> <input type="text" class="form-control" value="{{old('phone')}}"  name="phone" required>

                               @error('phone')
                               <div class="alert alert-warning">{{ $message }}</div>
                           @enderror
                            
                        </p>
                        <p>
                            
                                <strong style="color:rgb(10, 167, 101);">quantity:
                               </strong> <input type="number" class="form-control" name="quantity" value="1" min="1"  max="100">
                               @error('quantity')
                               <div class="alert alert-warning">{{ $message }}</div>
                           @enderror
                            
                        </p>
                        <p>
                            
                                <strong style="color:rgb(10, 167, 101);">date:
                               </strong> <input type="date" class="form-control" name="date" value="{{old('date')}}" required>
                               @error('date')
                               <div class="alert alert-warning">{{ $message }}</div>
                           @enderror
                            
                        </p>
                        <p>
                            
                                <strong style="color:rgb(10, 167, 101);">time:
                               </strong> <input type="time" class="form-control" name="time" value="{{old('time')}}" required>
                            
                               @error('time')
                               <div class="alert alert-warning">{{ $message }}</div>
                           @enderror
                        </p>
                        <p>
                            
                                <strong style="color:rgb(10, 167, 101);">address:
                               </strong> <textarea name="address" id="" class="form-control">{{old('address')}}</textarea>
                               @error('address')
                               <div class="alert alert-warning">{{ $message }}</div>
                           @enderror
                            
                        </p>
                        <p class="text-center">
                            
                              
                         <button type="submit"  class="btn btn-success" >Order Now</button>
                            
                        </p>

                     </form>
                      
                       @else
                           
                       <p class="text-center"><a class="btn btn-dark " href="{{route('login')}}"> please login </a></p>
                    @endif
                    
                </div>

            </div>
        </div>
    </div>
</div>


@endsection