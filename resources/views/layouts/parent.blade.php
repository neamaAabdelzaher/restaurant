<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>@yield('title')</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="{{asset('assets/dashboard/images/fevicon.png')}}" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('assets/dashboard/css/bootstrap.min.css')}}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{asset('assets/dashboard/style.css')}}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{asset('assets/dashboard/css/responsive.css')}}" />
      <!-- color css -->
      <link rel="stylesheet" href="{{asset('assets/dashboard/css/color_2.css')}}" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{asset('assets/dashboard/css/bootstrap-select.css')}}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{asset('assets/dashboard/css/perfect-scrollbar.css')}}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{asset('assets/dashboard/css/custom.css')}}" />
      {{-- FontAwesome cdn --}}

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
       <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

      <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
      @yield('css')
   </head>
   <body class="dashboard dashboard_2">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     {{-- <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="{{asset('assets/dashboard/images/logo/logo_icon.png')}}" alt="#" /></a>
                     </div> --}}
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="{{asset('assets/dashboard/images/layout_img/user_img.jpg')}}" alt="#" /></div>
                        <div class="user_info">
                           <h6>{{ Auth::user()->name }}</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Meals</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                           <li>
                              <a href="{{route('dashboard.meals.index')}}"> <span>All Meals</span></a>
                           </li>
                           <li>
                              <a href="{{route('dashboard.meals.create')}}"> <span>Create Meal</span></a>
                           </li>
                        </ul>
                     </li>
                     
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Categories</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="{{route('dashboard.categories.index')}}"> <span>All Categories</span></a></li>
                           <li><a href="{{route('dashboard.categories.create')}}"> <span>Create Category</span></a></li>
                        </ul>
                     </li>
                     <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Orders</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li>
                              <a href="{{route('dashboard.orders.index')}}"> <span> All Orders</span></a>
                           </li>
                         
                        </ul>
                     </li>
                     
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        {{-- <div class="logo_section">
                           <a href="index.html"><img class="img-responsive" src="{{asset('assets/dashboard/images/logo/logo_black.png')}}" alt="#" /></a>
                        </div> --}}
                <img src="{{asset('assets/images/logo.png')}}" width="70" height="70" alt="logo">
                <a class="navbar-brand" href="{{ url('/') }}">Restaurant</a>

                        <div class="right_topbar">
                           <div class="icon_info">
                              {{-- <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul> --}}
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{asset('assets/dashboard/images/layout_img/user_img.jpg')}}" alt="#" /><span class="name_user">{{ Auth::user()->name }}</span></a>
                                    <div class="dropdown-menu">
                                    
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('auth.logout') }}  <i class="fa fa-sign-out"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                   
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
              @yield('content')
               <!-- end dashboard inner -->

               <div class="container-fluid fixed-bottom ">
                <div class="footer mt-5  ">
                   <p class=" text-center">Copyright © 2023 Designed by Neama Abdelzaher  <a href="">ThemeWagon</a>
                   </p>
                </div>
             </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="{{asset('assets/dashboard/js/jquery.min.js')}}"></script>
      <script src="{{asset('assets/dashboard/js/popper.min.js')}}"></script>
      <script src="{{asset('assets/dashboard/js/bootstrap.min.js')}}"></script>
      <!-- wow animation -->
      <script src="{{asset('assets/dashboard/js/animate.js')}}"></script>
      <!-- select country -->
      <script src="{{asset('assets/dashboard/js/bootstrap-select.js')}}"></script>
      <!-- owl carousel -->
      <script src="{{asset('assets/dashboard/js/owl.carousel.js')}}"></script> 
      <!-- chart js -->
      <script src="{{asset('assets/dashboard/js/Chart.min.js')}}"></script>
      <script src="{{asset('assets/dashboard/js/Chart.bundle.min.js')}}"></script>
      <script src="{{asset('assets/dashboard/js/utils.js')}}"></script>
      <script src="{{asset('assets/dashboard/js/analyser.js')}}"></script>
      <!-- nice scrollbar -->
      <script src="{{asset('assets/dashboard/js/perfect-scrollbar.min.js')}}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{asset('assets/dashboard/js/custom.js')}}"></script>
      <script src="{{asset('assets/dashboard/js/chart_custom_style2.js')}}"></script>
      <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
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

         @yield('js')

   </body>
</html>