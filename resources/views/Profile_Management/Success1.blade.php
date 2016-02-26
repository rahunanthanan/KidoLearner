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


    <hr>

    <div class="alert alert-success">
        <strong>Your password has been changed. Checkyour mail for confirmation</strong>
    </div>

    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('MyProfile') }}">
        Click here to login again
        <li><a href="{{ url('/MyProfile') }}">Login</a></li>
    </form>
    <br>

</div>

</body>
</html>