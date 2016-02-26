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

<nav class="navbar navbar-inverse">

    <div class="container-fluid">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="#">KidoLearners</a>

        </div>


        <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav">

                @if (Auth::guest())
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>

                @elseif(session()->has('user'))
                    <li class="active"><a href="#">My Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/ChangePassword') }}">Change Password</a></li>
                            <li><a href="#">Upload Profile Picture</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li>
                @endif

            </ul>



            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/CreateProfile') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="{{ url('/LoginUser') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

                @elseif(session()->has('user'))
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> {{ Auth::user()->Name }}</a>

                        <ul class="dropdown-menu">
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                @endif

            </ul>

        </div>

    </div>
</nav>

<div class="container">

</div>


@yield('content')

</body>
</html>