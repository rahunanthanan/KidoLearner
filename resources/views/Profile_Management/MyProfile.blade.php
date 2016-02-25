<html>
<head>

    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>



<div class="container">



    <hr>
    <?php  $username='John';?>


    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/John') }}"><?php $username; ?></a></li>
        </ul>


        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">

            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/Login') }}">Login</a></li>
               {{--<!--<li><a href="{{ url('/ChangePassword') }}">Change Password</a></li>-->--}}
               <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Settings<span class="caret"></span>
                        </a>
                    <ul class="dropdown-menu" role="menu">
                      {{--  <li><a href="{{ url('/ChangePassword') }}">Change Password</a></li>
                        <li><a href="{{ url('/MyDetails') }}">View My Details</a></li>--}}

                    </ul>

                </li>-->
               <!-- <li><a href="{{ url('/register') }}">Register</a></li>-->

            @else
               {{-- <img src="{{asset('Uploads/'.$reg->ProfilePicture)}}" height="180" width="150" class="img-rounded">--}}

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->Name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">

                        <li><a href="{{ url('/ProfilePicture') }}">Upload Profile Picture</a></li>
                        <li><a href="{{ url('/MyChildDetails') }}">View My Child</a></li>
                        <li><a href="{{ url('/MyDetails') }}">View My Details</a></li>
                        <li><a href="{{ url('/Child') }}">Add More Child</a></li>
                        <li><a href="{{ url('/ChangePassword') }}">Change Password</a></li>
                        <li><a href="{{ url('/Login') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
    </div>


</body>
</html>