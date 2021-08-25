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
    <link href="{{ asset('css/fontawsome.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">        


    <link href="{{ asset('css/datatables.min.css')}}" rel="stylesheet">

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
<body style="background-color: #e8ddba;background-image:url(' {{ asset('img/goldbt1.png')}}');background-size:10px;">
   
    
    <header >
        <div class="topnav mb-4 mt-3" style="background-image:url( {{ asset('img/goldenkanot1.png')}});background-size: 170px;background-clip: border-box;backface-visibility: visible;">

          <h4 id="caption" class="mt-5">
            EMPLOYEE ATTENDANCE MANAGEMENT 
         </h4>
     </div>        
    </header>  

        <!-- ======= Header ======= -->

        <main class="py-4">
          <div class="wrapper d-flex align-items-stretch" >

            <nav id="sidebar" style="background-image: url({{ asset('img/ballon.jpg')}}">
              
              <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                  <i class="fa fa-bars"></i>
                  <span class="sr-only">Toggle Menu</span>
                </button>
              </div>


              <div class="p-4">
                <div class="img bg-wrap text-center py-4" >
                <div class="user-logo">
                  <div class="img">
                    <img src="{{ asset('img/user.png')}}" style="width:100px;height: 100px; border-radius: 50%;">
                  </div>
                  @if(Session()->get('employee')->status)
                  <span style="color:white;"> Admin </span>
                  @else
                  <span style="color:white;"> Employee </span>
                  @endif
                </div>
              </div>
                
                <ul class="list-unstyled components mb-5">
                  
                  <li class="active">
                    <a href="/home"><span class="fa fa-home mr-3"></span>Home</a>
                  </li>

                  <li>
                    <a href="#"><span class="fa fa-user mr-3"></span> Profile</a>
                  </li>

                  <li>
                  <a href="employeeAttendances"><span class="fa fa-briefcase mr-3"></span> Attendance Log</a>
                  </li>
                  @if(Session()->get('employee')->status)
                  <li>
                      <a href="/employees"><span class="fa fa-user mr-3"></span> Employee List</a>
                  </li>

                  <li>
                    <a href="#"><span class="fa fa-briefcase mr-3"></span> Attendance List</a>
                  </li>
                  @endif
                  <li>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <span class="fa fa-sticky-note mr-3"></span> Log out </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                  </li>
                  
                  
                  
                </ul>
              </div>
            </nav>


            <div id="content" class="p-4 p-md-5 pt-5">
            @include('inc.messages')
            @yield('content')
            </div>
           
          </div>
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

    <script src="{{ asset('js/jquery.min.js') }}"></script>
     <script src="{{ asset('js/bootstrap.min.js') }}" type="javascriptss"></script>
     <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{asset('js/datatables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>

     <script>
      $(document).ready(function(){
          $('#attendancelog').DataTable({
              pageLength: 25,
              dom: 'lTfgitp',
              searching: false,
              // buttons: [
              //     {extend: 'excel', title: 'AttendanceList'},
              //     {extend: 'csv', title: 'AttendanceList'},
              //     {extend: 'pdf', title: 'AttendanceList'},
                
              // ]
          });
          
      });
      

    </script>

<script>
      $(document).ready(function(){
          $('#employeelist').DataTable({
              pageLength: 25,
              dom: 'lTfgitp',
              searching: true,
              // buttons: [
              //     {extend: 'excel', title: 'AttendanceList'},
              //     {extend: 'csv', title: 'AttendanceList'},
              //     {extend: 'pdf', title: 'AttendanceList'},
                
              // ]
          });
          
      });
      

    </script>

</body>
</html>

