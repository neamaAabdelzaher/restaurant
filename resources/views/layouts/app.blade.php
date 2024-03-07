<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    {{-- bootstrap cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

       @yield('css')
      <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
 

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img src="{{asset('assets/images/logo.png')}}" width="70" height="70" alt="logo">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Restaurant
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                          
                                <li class="nav-item">
                                    <a class="@if(Route::currentRouteName() === 'login') text-dark fw-bold active @endif nav-link " href="{{ route('login') }}">{{ __('auth.login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="@if(Route::currentRouteName() === 'register') text-dark fw-bold active @endif nav-link"  href="{{ route('register') }}">{{ __('auth.register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="@if(Route::currentRouteName() === 'visitorPage') text-dark fw-bold active @endif nav-link" href="{{route('visitorPage')}}">Home</a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('auth.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>



         @yield('js')
     {{-- toastr --}}
     <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
 
     <script>
        @if(Session::has('message_id'))
        var type ="{{Session::get('alert-type','info')}}"
        switch(type){
            case'info':
            toastr.info("{{Session::get('message_id')}}");
            
            break;
    
             case'success':
            toastr.success("{{Session::get('message_id')}}");
            break;
    
            case'warning':
            toastr.warning ("{{Session::get('message_id')}}");
            break;
    
             case'error':
            toastr.error ("{{Session::get('message_id')}}");
            break;
        }
    
    @endif
    </script>
</body>
</html>
