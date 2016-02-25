<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
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

    @if(Session::has('message'))
        <p class="alert"><font color="red">{{ Session::get('message') }}</font></p>
    @endif

    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/CreateProfile') }}">


<div class="row">

    <div class="col-md-12">
        <?php if(isset($errors)){ ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

        @if (count($errors) > 0)

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

        @endif
            </div>

        <?php } ?>

        <?php if(isset($status)){ ?>
        <div class="alert alert-danger">
            {{ $status }}
        </div>

        <?php } ?>

        <?php if(isset($message)){
            echo $message;}?>


    </div>

    <div class="col-md-6">

        <br>
    <h2 class="text-muted text-left">
        Sign Up
    </h2>

<br>
        <div class="form-group">

            <label class="control-label col-md-3" for="name">Name:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-7">
                <input type="text" name="name" class="form-control" id="name" >
              {{-- @if ($errors->has('first_name')) <p class="help-block"><font color="red">{{ $errors->first('first_name') }}</font></p> @endif--}}
            </div>

        </div>

        <div class="form-group">

            <label class="control-label col-md-3" for="email">Email:</label>

            <div class="control-label col-md-1"></div>

            <div class="col-md-7">
                <input type="text" class="form-control" name="email" id="email" placeholder="eg: xyz@abc.com">
               {{-- @if ($errors->has('email')) <p class="help-block"><font color="red">{{ $errors->first('email') }}</font></p> @endif--}}
            </div>

        </div>


            <div class="form-group">

                <label class="control-label col-md-3" for="password">Password:</label>

                <div class="control-label col-md-1"></div>

                <div class="control-label col-md-7">
                    <input type="password" name="password" class="form-control " id="password">
                   {{-- @if ($errors->has('password')) <p class="help-block"><font color="red">{{ $errors->first('password') }}</font></p> @endif--}}

                </div>

            </div>

        <div class="form-group">

            <label class="control-label col-md-3" for="password">Confirm Password:</label>

            <div class="control-label col-md-1"></div>

            <div class="control-label col-md-7">
                <input type="password" name="c_password" class="form-control " id="c_password">
                {{-- @if ($errors->has('password')) <p class="help-block"><font color="red">{{ $errors->first('password') }}</font></p> @endif--}}

            </div>

        </div>

          {{--
                <div class="form-group">

                    <label class="control-label col-md-4" for="profile_picture">Choose:</label>

                    <div class="control-label col-md-4">

                        <input type="file" name="filefield">
                    </div>

                </div>
--}}


        <br>
        <br>
        <br>

                <div class="form-group">

                <div class="col-md-offset-8 col-md-5">

                    <button type="submit" class="btn btn-lg btn btn-success" name="btnSignUp" id="btnSignUp" value="CreateProfile">Sign Up</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="button" class="btn btn-default" name="btnCancel" id="btnCancel">Cancel</button>

                </div>

            </div>


    </div>
</div>
            </fieldset>
        </form>
</div>

</body>
</html>
