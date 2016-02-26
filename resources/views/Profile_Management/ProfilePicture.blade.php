<html>
<head>

    <title>Upload Profile Picture</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">

    <h1 class="text-muted text-center">
        Upload Profile Picture
    </h1>

    <hr>

    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/ProfilePicture') }}">
        <input type="hidden" name="login_id" value="19">
        <div class="form-group">
            <label class="control-label col-md-4" for="profile_picture">Choose:</label>
            <div class="control-label col-md-4">
                <input type="file" name="filefield">
            </div>
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

        <div class="form-group">
            <div class="col-md-offset-8 col-md-5">
                <button type="submit" class="btn btn-lg btn btn-success" name="change" id="change" value="Change">Upload</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
{{--
                <button type="button" class="btn btn-default" name="l_btnCancel" id="l_btnCancel"> <a href="/LoginUser">Cancel</a></button>
--}}
            </div>

            @if (count($errors) < 0)
                <div class="alert alert-success">
                    <strong>Your Profile Picture has been uploaded successfully.</strong>
                </div>

            @endif
        </div>

    </form>

</div>

</body>
</html>