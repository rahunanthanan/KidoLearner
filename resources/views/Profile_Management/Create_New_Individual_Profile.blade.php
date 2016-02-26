@extends('Profile_Management.MyProfile')

@section('content')

<div class="container">

    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/CreateProfile') }}">

        <div class="col-md-12">

            <br>
            <h2 class="text-muted text-center">
                Sign Up
            </h2>

            <br>
            <div class="form-group">
                <label class="control-label col-md-4" for="name">Name:</label>
                <div class="control-label col-md-1"></div>
                <div class="control-label col-md-4">
                    <input type="text" name="name" class="form-control" id="name" >
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-4" for="email">Email:</label>
                <div class="control-label col-md-1"></div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="email" id="email" placeholder="eg: xyz@abc.com">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-4" for="password">Password:</label>
                <div class="control-label col-md-1"></div>
                <div class="control-label col-md-4">
                    <input type="password" name="password" class="form-control " id="password">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-4" for="ConfirmPassword">Confirm Password:</label>
                <div class="control-label col-md-1"></div>
                <div class="control-label col-md-4">
                    <input type="password" name="ConfirmPassword" class="form-control " id="ConfirmPassword">
                </div>
            </div>

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

            <br>
            <br>
            <br>

            <div class="form-group">
                <div class="col-md-offset-8 col-md-5">
                    <button type="submit" class="btn btn-lg btn btn-success" name="btnSignUp" id="btnSignUp" value="CreateProfile">Sign Up</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="button" class="btn btn-default" name="btnCancel" id="btnCancel" value="MyProfile">Cancel</button>
                </div>
            </div>

        </div>

    </form>

</div>

@endsection


