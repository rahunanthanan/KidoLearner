<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kido Learners</title>


    <link rel="icon" type="image/png" href="/Myfiles/child_learning.jpg" sizes="32x32">

    <!--sweet alert-->

    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <style>

       /* header part backgroundImage*/

        #banner
        {
            background-image:url("header.jpg");
            background-repeat:no-repeat;
            background-position:center center;
            background-size:100% 100px;
            height:100px;
            text-align:center;
        }

        /*navaigation bar top color*/

        #navbartop
          {
            background-color: #004280;
          }

       /*navaigation bar top text color*/

         #navbartoptextcolor
         {

             color: white;
         }

       #feedbackTableWidth
       {
           width:1000px;


       }


/*        body {
            font-family: 'Lato';
        }

        #myDIV {
            background: teal;
            -webkit-animation: mymove 1s infinite; !* Chrome, Safari, Opera *!
            animation: mymove 5s infinite;
        }

        !* Chrome, Safari, Opera *!
        @-webkit-keyframes mymove {
            from {background-color: darkseagreen;}
            to {background-color: lightseagreen;}
        }

        !* Standard syntax *!
        @keyframes mymove {
            from {background-color: darkseagreen;}
            to {background-color:  teal;}
        }
        .fa-btn {
            margin-right: 6px;
        }

        h1 {
            font: italic bold 70px/100px Georgia, serif, white;
            color: white;

        }*/
    </style>


</head>



<body background="kido_bg.jpg">



<div class="w3-card-4" id="banner">
    {{--<div class="w3-container w3-theme w3-card-2" style="text-align: center">
        <h1>Kido Learners</h1>
    </div>--}}
</div>
<nav class="w3-navbar w3-border" id="navbartop">
    <div class="container">

        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            {{--<a class="navbar-brand" href="{{ url('/') }}">
                Laravel
            </a>--}}
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            {{--<ul class="nav navbar-nav">
                <li><a class="w3-hover-teal" href="{{ url('/home') }}">Home</a></li>
            </ul>--}}

                    <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a class="w3-hover-blue" id="navbartoptextcolor" href="{{ url('/login') }}">Login</a></li>
                    <li><a class="w3-hover-blue" id="navbartoptextcolor" href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="w3-dropdown-hover" >
                        <a class="w3-hover-blue" id="navbartoptextcolor" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Settings <span class="caret"></span>
                        </a>

                        <div class="w3-dropdown-content w3-white w3-card-4" >
                            <a class="w3-hover-teal" href="{{ url('/home/ChangePassword') }}">Change Password</a>
                        </div>
                    </li>
                    <li class="w3-dropdown-hover">
                        <a class="w3-hover-teal"  id="navbartoptextcolor" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="w3-dropdown-content w3-white w3-card-4">
                            <a class="w3-hover-blue" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<br>
<br>
{{--<div class="container">--}}

    @yield('content')
    @include('sweet::alert')
{{--</div>--}}

        <!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
