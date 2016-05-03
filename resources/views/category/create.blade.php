@extends('layouts.app')

@section('content')


    <h1>Create Course</h1>
    {{--{!! Form::open(['url'=>'courses'],['files=>true'])!!}--}}
    <form class="form-vertical" enctype="multipart/form-data" method="post" action="{{ url('category') }}"/>


    {{--Error message for empty name field--}}

    @if(Session::has('flash_category_empty'))


        <script>

            swal({title: "Error!",   text: "Empty Filed!",type: "error", confirmButtonText: "Cool" });

        </script>


    @endif

    <div class="form-group">

        {!! Form::label('name','Name:') !!}

        {!! Form::text('name',null,['class'=>'form-control']) !!}

    </div>


    <div class="form-group">

        {!! Form::submit('Save',['class' => 'btn btn-success']) !!}

    </div>


    <input type="hidden" value="{{ csrf_token() }}" name="_token">


    {!! Form::close() !!}

@stop