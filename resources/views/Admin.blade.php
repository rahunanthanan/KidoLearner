@extends('layouts.app')

@section('content')

    <div class="col-md-2 col-md-offset-0" style="background-color: #00264d; color: white">
        <ul class="nav nav-pills nav-stacked">
            <li ><a class="w3-hover-blue" href="#">Home</a></li>
            <li class="dropdown" >
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu 1 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a class="w3-hover-green" href="/task">To Do List</a></li>
                    <li><a class="w3-hover-yellow" href="#">Submenu 1-2</a></li>
                    <li><a class="w3-hover-blue" href="#">Submenu 1-3</a></li>
                </ul>
            </li>
            <li><a class="w3-hover-orange" href="#">Menu 2</a></li>
            <li><a class="w3-hover-yellow" href="/task">To Do List</a></li>
        </ul>
    </div>
    <div class="col-md-2 col-md-offset-0">

    </div>

@endsection