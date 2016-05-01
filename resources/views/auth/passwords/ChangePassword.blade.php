@extends('layouts.app')

@section('content')

<div class="container w3-animate-zoom" >

    <div class="col-md-3 col-md-offset-1">
        <a href="/admin" style="color: blue;">Home</a>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #196719; color: white">Change Password</div>

                <div class="panel-body" style="background-color: #d6f5d6;">
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/home/ChangePassword') }}">

                        @if(Session::has('fail'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Warning!</strong> {{ Session::get('message1', '') }}
                            </div>
                        @endif

                        <div class="form-group {{ $errors->has('oldPassword') ? ' has-error' : '' }}">
                            <label class="control-label col-md-4" for="oldPassword">Old Password:</label>
                            <div class="control-label col-md-1"></div>
                            <div class="control-label col-md-4">
                                <input type="password" name="oldPassword" class="form-control " id="oldPassword" value="{{ old('oldPassword') }}">
                                @if($errors->has('oldPassword'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('oldPassword')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('newPassword') ? ' has-error' : '' }}">
                            <label class="control-label col-md-4" for="newPassword">New Password:</label>
                            <div class="control-label col-md-1"></div>
                            <div class="control-label col-md-4">
                                <input type="password" name="newPassword" class="form-control " id="newPassword">
                                @if($errors->has('newPassword'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('newPassword')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('confirmPassword') ? ' has-error' : '' }}">
                            <label class="control-label col-md-4" for="confirmPassword">Confirm Password:</label>
                            <div class="control-label col-md-1"></div>
                            <input type="hidden" name="login_id" value="19">
                            <div class="control-label col-md-4">
                                <input type="password" name="confirmPassword" class="form-control " id="confirmPassword">
                                @if($errors->has('confirmPassword'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('confirmPassword')}}</strong>
                                     </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-7 col-md-8">
                                <button type="submit" class="btn btn-primary"
                                        style="background-color: #196719; color: white"
                                        name="change" id="change" value="Change">Change Password
                                </button>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



</div>

@endsection



