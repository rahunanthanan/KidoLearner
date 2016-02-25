<html>
<head>

    <title>Success</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>



<div class="container">

        <h1 class="text-muted text-center">
            Welcome to Kido Learners
        </h1>

        <hr>

    <div class="alert alert-success">
        <strong>Successfully Registered!!!</strong> Please Login
    </div>

    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('Login') }}">

        <li><a href="{{ url('/Login') }}">Login</a></li>
    </form>
    <br>

</div>

</body>
</html>