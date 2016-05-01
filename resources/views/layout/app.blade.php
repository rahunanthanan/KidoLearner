<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kido Leaners</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
{{--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">--}}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <style>
        body {
            font-family: 'Lato';
        }

        #myDIV {
            background: teal;
            -webkit-animation: mymove 1s infinite; /* Chrome, Safari, Opera */
            animation: mymove 5s infinite;
        }

        /* Chrome, Safari, Opera */
        @-webkit-keyframes mymove {
            from {background-color: darkseagreen;}
            to {background-color: lightseagreen;}
        }

        /* Standard syntax */
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

        }
    </style>
</head>
<body style="background-color: aliceblue">

<div class="w3-card-4" id="myDIV">
    <div class="w3-container w3-theme w3-card-2" >
        <h1>Kido Learners</h1>
    </div>
</div>
    <nav class="w3-navbar w3-border w3-black">
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
                        <li><a class="w3-hover-blue" href="{{ url('/login') }}">Login</a></li>
                        <li><a class="w3-hover-green" href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="w3-dropdown-hover">
                            <a class="w3-hover-orange" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Settings <span class="caret"></span>
                            </a>

                            <div class="w3-dropdown-content w3-white w3-card-4">
                                <a class="w3-hover-green" href="{{ url('/home/ChangePassword') }}">Change Password</a>
                            </div>
                        </li>
                        <li class="w3-dropdown-hover">
                            <a class="w3-hover-yellow" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="w3-dropdown-content w3-white w3-card-4">
                                <a class="w3-hover-teal" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

<br>
<br>
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
