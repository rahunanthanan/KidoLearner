<html lang="en">
<head>
    <title>Child</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- These links the date picker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">




    <h1 class="text-muted text-center">
        Child
    </h1>

    <hr>


    <!-- Modal content-->



    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/Child') }}">
        <div class="form-group">

            <label class="control-label col-md-3" for="c_name">Full Name:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-6">
                <input type="text" name="c_name" class="form-control" id="c_name">
                {{-- @if ($errors->has('first_name')) <p class="help-block"><font color="red">{{ $errors->first('first_name') }}</font></p> @endif--}}
            </div>
        </div>

        <div class="form-group">

            <label  class="control-label col-md-3" >Date of Birth:</label>

            <div class="control-label col-md-1"></div>

            <div class="col-md-6">
                <input type="date" id="datepicker" name="c_dob" class="form-control" placeholder="Select the date">
                {{-- @if ($errors->has('date_of_birth')) <p class="help-block"><font color="red">{{ $errors->first('date_of_birth') }}</font></p> @endif--}}
            </div>

        </div>

        <div class="form-group">

            <label class="control-label col-md-3" for="country">Grade:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-6">
                <select class="form-control" name="c_grade">
                    <option value="PreKG">PreKG</option>
                    <option value="LKG">LKG</option>
                    <option value="UKG">UKG</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                {{--@if ($errors->has('country')) <p class="help-block"><font color="red">{{ $errors->first('country') }}</font></p> @endif--}}
            </div>

        </div>

        <div class="form-group">

            <label class="control-label col-md-3" for="c_school">School:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-6">
                <input type="text" name="c_school" class="form-control" id="c_school">
                {{-- @if ($errors->has('first_name')) <p class="help-block"><font color="red">{{ $errors->first('first_name') }}</font></p> @endif--}}
            </div>
        </div>

        <div class="form-group">
            <?php if(isset($errors)){ ?>
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

            <?php } ?>
            <?php if(isset($status)){ ?>
            <div class="alert alert-danger">

                {{ $status }}
            </div>

            <?php } ?>

            <div class="control-label col-md-6">
                <?php if(isset($message)){
                    echo $message;}?>
            </div>

        </div>



        <div class="form-group">

            <div class="col-md-offset-8 col-md-5">

                <button type="submit" class="btn btn-lg btn btn-success" name="c_add" id="c_add" value="Sign In">Add</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-default" name="c_btnCancel" id="c_btnCancel">Cancel</button>

            </div>

        </div>




    </form>


</div>



</body>
</html>