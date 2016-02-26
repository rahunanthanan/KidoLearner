@extends('layout.template')

@section('content')

    <h1>Update Subject</h1>


    {!! Form::model($subcategory,['method' => 'PATCH','route'=>['subCategory.update',$subcategory->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>


    @if ($errors->has('name')) <p class="help-block" style="color:red">{{ $errors->first('name') }}</p> @endif


    <div class="form-group">
        {!! Form::submit('Update',['class' => 'btn btn-primary']) !!}
    </div>



    {!! Form::close() !!}


@stop