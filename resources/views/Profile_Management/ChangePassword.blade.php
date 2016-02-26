@extends('Profile_Management.MyProfile')


@section('content')




    <div class="container">





        <h1 class="text-muted text-center">
            Change Password
        </h1>

        <hr>




        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/ChangePassword') }}">
            <input type="hidden" name="login_id" value="19">
            {{--
                    {{ Auth::user()->Name }}
            --}}

            <div class="form-group">

                <label class="control-label col-md-4" for="n">Name:</label>

                <div class="control-label col-md-1"></div>

                <div class="control-label col-md-4">
                    <input type="text" name="n" class="form-control" id="n" {{--id="" readonly value="{{ Auth::user()->Name }}"--}} >
                    {{-- @if ($errors->has('first_name')) <p class="help-block"><font color="red">{{ $errors->first('first_name') }}</font></p> @endif--}}
                </div>

            </div>

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

                    <button type="submit" class="btn btn-lg btn btn-success" name="change" id="change" value="Change">Change Password</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="button" class="btn btn-default" name="l_btnCancel" id="l_btnCancel">Cancel</button>

                </div>

            </div>


        </form>


    </div>


@endsection
