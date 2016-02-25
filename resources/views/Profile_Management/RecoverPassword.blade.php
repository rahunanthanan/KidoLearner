<html>
<head>

    <title>Recover Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>



<div class="container">





    <h1 class="text-muted text-center">
        Recover Password
    </h1>

    <hr>




    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/RecoverPassword') }}">


        <div class="form-group">

            <label class="control-label col-md-4" for="r_email">User Name:</label>

            <div class="control-label col-md-1"></div>

            <div class="col-md-4">
                <input type="text" class="form-control" name="r_email" id="r_email" placeholder="eg: xyz@abc.com">
                {{-- @if ($errors->has('email')) <p class="help-block"><font color="red">{{ $errors->first('email') }}</font></p> @endif--}}
            </div>

        </div>



        <div class="form-group">

            <label class="control-label col-md-4" for="r_new_password">New Password:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-4">
                <input type="password" name="r_new_password" class="form-control " id="r_new_password">
            </div>

        </div>

        <div class="form-group">

            <label class="control-label col-md-4" for="r_confirm_password">Confirm Password:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-4">
                <input type="password" name="r_confirm_password" class="form-control " id="r_confirm_password">
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="form-group">

            <div class="col-md-offset-8 col-md-5">

                <button type="submit" class="btn btn-lg btn btn-success" name="reset" id="reset" value="Change">Reset Password</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-default" name="l_btnCancel" id="l_btnCancel">Cancel</button>

            </div>

        </div>


    </form>


</div>



</body>
</html>