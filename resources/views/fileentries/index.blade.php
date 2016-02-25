{{--
@extends('layout.template')

@section('content')


    <form class="form-vertical" enctype="multipart/form-data" method="post" action="{{ url('add') }}"/>
        <input type="file" name="filefield_file">
        <input type="submit">

    <input type="hidden" value="{{ csrf_token() }}" name="_token">

    </form>

    <h1> Pictures list</h1>

    <div class="row">

        <ul>
            @foreach($entries as $entry)
                <li>{{$entry->filename}}</li>
            @endforeach
        </ul>
    </div>

@endsection--}}

@extends('layout.template')

@section('content')

    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">


   {{-- <form class="form-vertical" enctype="multipart/form-data" method="post" action="{{ url('addentry') }}"/>--}}
{{--    <form class="form-vertical" enctype="multipart/form-data" method="post" action="{{ url('getentry') }}"/>--}}
{{--
    <input type="file" name="filefield">
    <input type="submit">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    </form>

    <h1> Pictures list</h1>

    <div class="row">

        <ul>
            @foreach($entries as $entry)
                <li>{{$entry->original_filename}}</li>
            @endforeach
        </ul>
    </div>

@endsection
--}}






    <form action="{{url('addentry', [])}}" method="post" enctype="multipart/form-data">
        <input type="file" name="filefield">
        <input type="submit">
    </form>

    <h1> Pictures list</h1>
    <div class="row">
        <ul class="thumbnails">
            @foreach($entries as $entry)
                <div class="col-md-2">
                    <div class="thumbnail">
                        <img src="{{url('getentry',$entry->filename)}}" alt="ALT NAME" class="img-responsive" />
                        <div class="caption">
                            <p>{{$entry->original_filename}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>

@endsection
