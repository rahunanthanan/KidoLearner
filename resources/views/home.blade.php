@extends('layouts.app')

@section('content')

    <div class="col-md-2 col-md-offset-0" style="background-color: teal; color: white">
        <ul class="nav nav-pills nav-stacked">
            <li ><a class="w3-hover-blue" href="/home">Home</a></li>
            <li class="dropdown" >
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu 1 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a class="w3-hover-green" href="/task">Child</a></li>
                    <li><a class="w3-hover-yellow" href="#">Submenu 1-2</a></li>
                    <li><a class="w3-hover-blue" href="#">Submenu 1-3</a></li>
                </ul>
            </li>
            <li><a class="w3-hover-orange" href="#">Menu 2</a></li>
            <li><a class="w3-hover-yellow" href="/AddChild">Child</a></li>
        </ul>
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
