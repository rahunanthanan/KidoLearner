
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


<!-- side navigation bar-->

<div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">


    @include('layouts.adminSidenavbar')


</div>



<!--content page container -->

<div class="col-md-2 col-md-offset-0"></div>
<div class="container w3-animate-zoom">
    <div class="col-md-7 col-md-offset-0">
        <div class="row">
            <div class="col-md-20 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading "  style="background-color: #004280; color: white">Course Materials</div>
                    <div class="panel-body" style="background-color: #e6eeff">


                        <br>




                        <h1>Create Lesson</h1>

                        <!--create course form -->

                        <form class="form-vertical" enctype="multipart/form-data" method="post" action="{{ url('courses') }}"/>


                        <!--course name -->

                        <div class="form-group">
                            {!! Form::label('name','Name:') !!}

                            {!! Form::text('name',null,['class'=>'form-control']) !!}

                        </div>


                        Error message for name field

                        @if ($errors->has('name')) <p class="help-block" style="color:red">{{ $errors->first('name') }}</p> @endif


                                <!--Group selection -->

                        <div class="form-group">

                            <label for="">Group</label>


                            <select class="form-control input-sm" name="category" id="category">

                                @foreach($categories as $category)

                                    <option value="{{$category->id}}">{{$category->name}}</option>

                                @endforeach

                            </select>


                        </div>

                        <!--Activity selection -->

                        <div class="form-group">
                            <label for="">Activity</label>


                            <select class="form-control input-sm" name="subcategory" id="subcategory">

                                <option value=""></option>

                            </select>

                        </div>


                        <!--Description field-->

                        <div class="form-group">
                            {!! Form::label('Description','Description:') !!}
                            {!! Form::textarea('description',null,['class'=>'form-control','size' => '5x5']) !!}
                        </div>

                        <!--Error message for description field empty-->

                        @if ($errors->has('description')) <p class="help-block" style="color:red">{{ $errors->first('description') }}</p> @endif


                                <!--Upload date -->

                        <div class="form-group">
                            {!! Form::label('date', 'UploadDate:') !!}

                            <input type="date"  name="date" value="<?php echo date('Y-m-d'); ?>" />
                        </div>

                        <br><br>

                        <!--File field for upload image -->

                        <div class="form-group">

                            <label for="filefield">Upload Image</label>
                            <input type='file' name="filefield" />
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">

                        </div>


                        <!--Error message for filefield is empty -->

                        @if ($errors->has('filefield')) <p class="help-block" style="color:red">{{ $errors->first('filefield') }}</p> @endif


                                <!--Sumbit button -->

                        <div class="form-group">
                            {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
                        </div>


                        <script>

                            <!--dropchain for category  selection-->

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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop