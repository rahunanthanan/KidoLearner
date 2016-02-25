@extends('layout.template')

@section('content')

        <!--  jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"> </script>
        <!-- Isolated Version of Bootstrap, not needed if your site already used Bootstrap -->
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>





    <h1>Create Course</h1>
    {{--{!! Form::open(['url'=>'courses'],['files=>true'])!!}--}}
<form class="form-vertical" enctype="multipart/form-data" method="post" action="{{ url('courses') }}"/>



    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    {{--<div class="form-group">
        {!! Form::label('Category','Category:') !!}
        {!! Form::text('category',null,['class'=>'form-control']) !!}
    </div>
--}}

    <div class="form-group">
        <label for="">Group</label>
        <select class="form-control input-sm" name="category" id="category">

                        @foreach($categories as $category)

                            <option value="{{$category->id}}">{{$category->name}}</option>

                        @endforeach
         </select>


    </div>
    <div class="form-group">
        <label for="">Activity</label>
        <select class="form-control input-sm" name="subcategory" id="subcategory">



                <option value=""></option>


        </select>


    </div>



    <div class="form-group">
        {!! Form::label('Description','Description:') !!}
        {!! Form::textarea('description',null,['class'=>'form-control','size' => '5x5']) !!}
    </div>

    {!! Form::label('date', 'UploadDate:') !!}

        <input type="date"  name="date" value="<?php echo date('Y-m-d'); ?>" />
    </div>

    <br><br>

    <div class="form-group">

        <label for="filefield">Upload Image</label>
        <input type='file' name="filefield" />
        <input type="hidden" value="{{ csrf_token() }}" name="_token">

    </div>


    <div class="form-group">
        {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
    </div>

    <script>

        $('#category').on('change',function(e){

           console.log(e);
           var cat_id= e.target.value;

            $.get('/ajax-subcat?cat_id=' + cat_id,function(data){

                console.log(data);
                $('#subcategory').empty();

                $.each(data,function(index,subcatObj){


                    $('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.name+ '</option>');

                });

            });



        });



    </script>



{!! Form::close() !!}
@stop