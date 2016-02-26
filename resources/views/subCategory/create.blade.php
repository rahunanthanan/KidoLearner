@extends('layout.template')

@section('content')


    <h1>Create Subject</h1>
    {{--{!! Form::open(['url'=>'courses'],['files=>true'])!!}--}}
    <form class="form-vertical" enctype="multipart/form-data" method="post" action="{{ url('subCategory') }}"/>

  {{--  <form action="{{url('addentry', [])}}" method="post" enctype="multipart/form-data">--}}

     {{-- <input type="hidden" name="catId" value="{{$cat}}">--}}

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