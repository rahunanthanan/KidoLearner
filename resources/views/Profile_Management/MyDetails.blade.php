<html>
<head>

    <title>My Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>



<div class="container">

    <h1 class="text-muted text-center">
        My Details
    </h1>

    <hr>


    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/MyDetails') }}">

        <div class="form-group">

            <label class="control-label col-md-4" for="m_first_name">First Name:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-3">
                <input type="text" name="m_first_name" class="form-control" id="m_first_name" placeholder={{$reg->FirstName}} readonly>
                {{-- @if ($errors->has('first_name')) <p class="help-block"><font color="red">{{ $errors->first('first_name') }}</font></p> @endif--}}
            </div>

        </div>


        <div class="form-group">

            <label class="control-label col-md-4" for="m_last_name">Last Name:</label>

            <div class="control-label col-md-1"></div>


            <div class="control-label col-md-3">
                <input type="text" name="m_last_name" class="form-control"  id="m_last_name" placeholder={{$reg->LastName}} readonly>
                {{-- @if ($errors->has('last_name')) <p class="help-block"><font color="red">{{ $errors->first('last_name') }}</font></p> @endif--}}
            </div>

        </div>


        <div class="form-group">

            <label class="control-label col-md-4" for="m_address">Address:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-3">
                <input type="text" name="m_address" class="form-control" id="m_address"  placeholder={{$reg->Address}} readonly>
                {{--@if ($errors->has('address')) <p class="help-block"><font color="red">{{ $errors->first('address') }}</font></p> @endif--}}
            </div>

        </div>


        <div class="form-group">

            <label class="control-label col-md-4" for="m_country">Country:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-3">
                <input type="text" name="m_country" class="form-control" id="m_country"  placeholder={{$reg->Country}} readonly>
                {{--@if ($errors->has('address')) <p class="help-block"><font color="red">{{ $errors->first('address') }}</font></p> @endif--}}
            </div>

        </div>

        <div class="form-group">

            <label class="control-label col-md-4" for="m_tel_no">Tel No:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-3">
                <input type="text" name="m_tel_no" class="form-control" id="m_tel_no" placeholder={{$reg->TelNo}} readonly >
                {{--@if ($errors->has('tel_no')) <p class="help-block"><font color="red">{{ $errors->first('tel_no') }}</font></p> @endif--}}
            </div>

        </div>


        <div class="form-group">

            <label class="control-label col-md-4" for="m_email">Email:</label>

            <div class="control-label col-md-1"></div>

            <div class="col-md-3">
                <input type="text" class="form-control" name="m_email" id="m_email" placeholder={{$reg->Email}} readonly>
                {{-- @if ($errors->has('email')) <p class="help-block"><font color="red">{{ $errors->first('email') }}</font></p> @endif--}}
            </div>

        </div>

        <div class="form-group">

            <label class="control-label col-md-4" for="m_dob">Tel No:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-3">
                <input type="text" name="m_dob" class="form-control" id="m_dob"  placeholder={{$reg->DateOfBirth}} readonly>
                {{--@if ($errors->has('tel_no')) <p class="help-block"><font color="red">{{ $errors->first('tel_no') }}</font></p> @endif--}}
            </div>

        </div>


        <div class="form-group">

            <label class="control-label col-md-4" for="m_no_of_kids">No of Kids:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-3">
                <input type="text" name="m_no_of_kids" class="form-control" id="m_no_of_kids"  placeholder={{$reg->NoOfKids}} readonly>
                {{--@if ($errors->has('no_of_kids')) <p class="help-block"><font color="red">{{ $errors->first('no_of_kids') }}</font></p> @endif--}}
            </div>

        </div>



    </form>


</div>



</body>
</html>