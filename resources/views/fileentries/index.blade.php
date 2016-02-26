
@extends('layout.template')

@section('content')

    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">


    <form class="form-vertical" enctype="multipart/form-data" method="post" action="{{ url('addentry') }}"/>
       {{--<form class="form-vertical" enctype="multipart/form-data" method="post" action="{{ url('getentry') }}"/>--}}
        <input type="file" name="filefield">

        <input type="submit">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">



        <h1> Course Materials</h1>


            <ul>
                @foreach($entries as $entry)
                    <li>{{$entry->original_filename}}</li>
                @endforeach
            </ul>


    </form>
    @endsection






