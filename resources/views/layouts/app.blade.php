<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Emplyoee Attendance System') }}</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">       
    <link href="{{ asset('css/fontawsome.min.css')}}" rel="stylesheet">

    <style>
        .footer {
           position: fixed;
           left: 0;
           bottom: 0;
           width: 100%;
           background-color: red;
           color: white;
           text-align: center;
        }
        
        .topnav {

        width: 100%;
        display: flex;
        flex-flow: nowrap;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        transition: .5s;
        list-style-type: none;
        opacity: inherit;
        height: 100px;
        background-color: #ffebcd;

        -moz-box-shadow: 5px 10px 16px #FFC300;
        -webkit-box-shadow: 5px 10px 16px #B7950B;
        box-shadow: outset 5px 10px 16px #e0e574;

        /*box-shadow: inset 0 0 50px #B7950B;*/
        box-shadow:inset 5px 5px 50px #B7950B;
        box-shadow:inset -5px -5px 50px #B7950B;

        }


        #caption {
        text-align: center;
        font-weight: 900;
        color: #8f5910;
        text-shadow: 2px 8px 6px rgba(0,0,0,0.2),
                    0px -5px 35px rgba(255,255,255,0.3);

        }

        header {
        display: flex;
        justify-content: center;
        /*height:100px;*/
        box-shadow: inset 0 5px 15px rgba(0,0,0,.2);  

        }

</style>
</head>
<body style="background-color: #e8ddba;bockground-image:url(' {{ asset('img/goldbt1.png')}}');">
   
    
    <header >
        <div class="topnav mb-4 mt-3" style="background-image:url( {{ asset('img/goldenkanot1.png')}});background-size: 170px;background-clip: border-box;backface-visibility: visible;">

          <h4 id="caption" class="mt-5">
            EMPLOYEE ATTENDANCE MANAGEMENT 
         </h4>
     </div>        
    </header>  

        <nav class="navbar navbar-expand-md navbar-dark bg-primary ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Employee Attendance System') }} --}}
                    Employee Attendance System
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav mr-auto">
                       Welcome  {{ Auth::user()->name }}
                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}

                               
                                <li class="nav-item">
                                    <a class="nav-link" href=""> Profile</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   
                                    <img src="{{ asset('img/user.png')}}" class="rounded-circle" alt="Cinque Terre" style="height: 50px;width:50px;">
                                    
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href=" ">
                                        Home
                                    </a>

                                    <a class="dropdown-item" href=" ">
                                        Profile
                                    </a>

                                    <a class="dropdown-item" href=" ">
                                        Attendance Log
                                    </a>

                                    {{-- for admin    --}}
                                    <a class="dropdown-item" href=" ">
                                        Attendace List
                                    </a>
                                    <a class="dropdown-item" href="/employees">
                                        Employee List
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
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
   
   
        <!-- ======= Header ======= -->


        <main class="py-4">
           
            @yield('content')
        </main>

         <!-- ======= Footer ======= -->



  <div class="navbar navbar-inverse navbar-fixed-bottom">
          <div class="container">
               <div class="copyright">
            &copy; Copyright <strong><span> Rivawes Co.,ltd</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
           
            Designed by <a href="">Group</a>
          </div>
          </div>
        </div>


    

     <script src="{{ asset('js/bootstrap.min.js') }}" type="javascriptss"></script>
     <script src="{{ asset('js/jquery.min.js') }}"></script>
     <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
