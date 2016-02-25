<html>
<head>

    <title>My Child Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>



<div class="container">

    <h1 class="text-muted text-center">
        Child Details
    </h1>

    <hr>


    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/MyChildDetails') }}">

        <div class="form-group">

            <label class="control-label col-md-4" for="v_full_name">Full Name:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-3">
                <input type="text" name="v_full_name" class="form-control" id="v_full_name" placeholder={{$reg1->Name}} readonly>
                {{-- @if ($errors->has('first_name')) <p class="help-block"><font color="red">{{ $errors->first('first_name') }}</font></p> @endif--}}
            </div>

        </div>


        <div class="form-group">

            <label class="control-label col-md-4" for="v_dob">Date Of Birth:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-3">
                <input type="text" name="v_dob" class="form-control" id="v_dob"  placeholder={{$reg1->DateOfBirth}} readonly>
                {{--@if ($errors->has('tel_no')) <p class="help-block"><font color="red">{{ $errors->first('tel_no') }}</font></p> @endif--}}
            </div>

        </div>







        <div class="form-group">

            <label class="control-label col-md-4" for="grade">Grade:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-3">
                <input type="text" name="grade" class="form-control" id="grade"  placeholder={{$reg1->Grade}} readonly>
                {{--@if ($errors->has('tel_no')) <p class="help-block"><font color="red">{{ $errors->first('tel_no') }}</font></p> @endif--}}
            </div>

        </div>


        <div class="form-group">

            <label class="control-label col-md-4" for="v_school">School:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-3">
                <input type="text" name="v_school" class="form-control" id="v_school"  placeholder={{$reg1->School}} readonly>
                {{--@if ($errors->has('no_of_kids')) <p class="help-block"><font color="red">{{ $errors->first('no_of_kids') }}</font></p> @endif--}}
            </div>

        </div>



    </form>


</div>



</body>
</html>