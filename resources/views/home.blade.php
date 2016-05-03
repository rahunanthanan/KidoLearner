@extends('layouts.app')

@section('content')

    <div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">


        @include('layouts.parentSidenavbar')


    </div>

    <div class="col-md-2 col-md-offset-0">
        <div class="container w3-animate-opacity">
            {{--<div class="w3-container w3-center w3-animate-opacity">--}}
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: darkcyan; color: white">Dashboard</div>

                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Success!</strong> {{ Session::get('message', '') }}
                            </div>
                        @endif

                        <div class="panel-body">
                            You are logged in!
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
