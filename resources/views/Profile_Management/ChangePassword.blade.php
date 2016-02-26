<html>
<head>

    <title>Change Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">

    <h1 class="text-muted text-center">
        Change Password
    </h1>

    <hr>

    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/ChangePassword') }}">
        <input type="hidden" name="login_id" value="19">
        <div class="form-group">
            <label class="control-label col-md-4" for="old_password">Old Password:</label>
            <div class="control-label col-md-1"></div>
            <div class="control-label col-md-4">
                <input type="password" name="old_password" class="form-control " id="old_password" >
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-4" for="new_password">New Password:</label>
            <div class="control-label col-md-1"></div>
            <div class="control-label col-md-4">
                <input type="password" name="new_password" class="form-control " id="new_password">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-4" for="confirm_password">Confirm Password:</label>
            <div class="control-label col-md-1"></div>
            <div class="control-label col-md-4">
                <input type="password" name="confirm_password" class="form-control " id="confirm_password">
            </div>
        </div>

        <div class="form-group">

            <div class="col-md-20">
                <?php if(isset($errors)){ ?>

                @if (count($errors) > 0)

                    <ul style='color:#ff0047;  list-style: none;  margin: 20px'  class="center-container">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                @endif

                <?php } ?>

                <?php if(isset($status)){ ?>

                <div class="alert alert-danger">
                    {{ $status }}
                </div>

                <?php } ?>

                <?php if(isset($message)){
                    echo "<div style='color:#ff0047'>$message</div>";}?>

            </div>

        </div>

        <div class="form-group">
            <div class="col-md-offset-8 col-md-5">
                <button type="submit" class="btn btn-lg btn btn-success" name="change" id="change" value="Change">Change Password</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-default" name="l_btnCancel" id="l_btnCancel">Cancel</button>
            </div>
        </div>

    </form>

</div>

</body>
</html>



