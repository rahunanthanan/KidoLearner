@extends('layouts.app')


@section('content')

    <h1>Update Group</h1>



    @if(Session::has('flash_category_empty'))
        <script>
            swal({title: "Error!",  text: "Empty Filed!",type: "error", confirmButtonText: "Cool" });
        </script>


    @endif

    {!! Form::model($category,['method' => 'PATCH','route'=>['category.update',$category->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>



    <div class="form-group">
        {!! Form::submit('Update',['class' => 'btn btn-primary']) !!}
    </div>



    {!! Form::close() !!}

@stop