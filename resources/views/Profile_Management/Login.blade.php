@extends('Profile_Management.MyProfile')

@section('content')

    <div class="container">

        <h1 class="text-muted text-center">
            Login
        </h1>

        <hr>

        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/LoginUser') }}">

            <div class="form-group">
                <label class="control-label col-md-3" for="l_user_name">UserName:</label>
                <div class="control-label col-md-1"></div>
                <div class="control-label col-md-6">
                    <input type="text" name="l_user_name" class="form-control" id="l_user_name" placeholder="email address">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3" for="l_password">Password:</label>
                <div class="control-label col-md-1"></div>
                <div class="control-label col-md-6">
                    <input type="password" name="l_password" class="form-control " id="l_password">
                </div>
            </div>

            <div class="control-label col-md-6">
                <li><a href="{{ url('/RecoverPassword') }}">Forgot Password?</a></li>
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
                    <button type="submit" class="btn btn-lg btn btn-success" name="l_btnSignIn" id="l_btnSignIn" value="Sign In">Sign In</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="button" class="btn btn-default" name="l_btnCancel" id="l_btnCancel">Cancel</button>
                </div>
            </div>

        </form>

    </div>

@endsection