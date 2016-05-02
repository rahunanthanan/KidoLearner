@extends('layouts.app')

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

<!--sweet alert-->

<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>




<!-- side navigation bar-->

<div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">


    @include('layouts.adminSidenavbar')


</div>


<div class="col-md-2 col-md-offset-0"></div>
<div class="container w3-animate-zoom">
    <div class="col-md-7 col-md-offset-0">
        <div class="row">
            <div class="col-md-20 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading "  style="background-color: #004280; color: white">Course Materials Upload</div>
                    <div class="panel-body" style="background-color: #e6eeff">


                        <br>


<form class="form-vertical" enctype="multipart/form-data" method="post" action="{{ url('fileentries') }}"/>






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

        @foreach($subcategories as $subcategory)

            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>

        @endforeach


    </select>

</div>


<div class="form-group">
    <label for="">Lesson</label>


    <select class="form-control input-sm" name="lesson" id="lesson">

        @foreach($courses as $course)

            <option value="{{$course->name}}">{{$course->name}}</option>

        @endforeach


    </select>

</div>



<br>

<div class="form-group">

    <label for="filefield">Upload File</label>
    <input type='file' name="filefield" />
    <input type="hidden" value="{{ csrf_token() }}" name="_token">

</div>


@if ($errors->has('filefield')) <p class="help-block" style="color:red">{{ $errors->first('filefield') }}</p> @endif


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




    $('#subcategory').on('change',function(e){

        console.log(e);
        var sub_cat_id= e.target.value;

        $.get('/ajax-lesson?sub_cat_id='+sub_cat_id,function(data){

            console.log(data);
            $('#lesson').empty();

            $.each(data,function(index,lessonObj){


                $('#lesson').append('<option value="'+lessonObj.name+'">'+lessonObj.name+ '</option>');

            });

        });



    });


</script>

</div>
                </div>
            </div>
        </div>

    </div>
</div>



@stop