
@extends('layouts.app')

@section('content')

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Isolated Version of Bootstrap, not needed if your site already used Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


    <!-- side navigation bar-->

    <div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">


        @include('layouts.adminSidenavbar')


    </div>

    <!-- container -->

    <div class="col-md-2 col-md-offset-0"></div>
    <div class="container w3-animate-zoom">
        <div class="col-md-7 col-md-offset-0">
            <div class="row">
                <div class="col-md-20 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-heading "  style="background-color: #004280; color: white">Lessons</div>
                        <div class="panel-body" style="background-color: #e6eeff">


                            <br>


                            <!--Form for update course-->

                            {!! Form::model($course,['method' => 'PATCH','route'=>['courses.update',$course->id ],'files' => true]) !!}

                                    <!--course name-->

                            <div class="form-group">
                                {!! Form::label('name', 'Name:') !!}
                                {!! Form::text('name',null,['class'=>'form-control']) !!}
                            </div>

                            <!--Error message for course name empty -->

                            @if ($errors->has('name')) <p class="help-block" style="color:red">{{ $errors->first('name') }}</p> @endif


                                    <!--selection for Group-->

                            <div class="form-group">
                                <label for="">Group</label>
                                <select class="form-control input-sm" name="category" id="category">

                                    @foreach( $categoryname  as $category)

                                        <option value="{{$category->id}}">{{$category->name}}</option>

                                    @endforeach
                                </select>
                            </div>


                            <!--selection for Activity-->

                            <div class="form-group">
                                <label for="">Activity</label>
                                <select class="form-control input-sm" name="subcategory" id="subcategory">

                                    <option value=""></option>
                                </select>

                            </div>


                            <!--text field for description-->


                            <div class="form-group">
                                {!! Form::label('description', 'Description:') !!}
                                {!! Form::textarea('description',null,['class'=>'form-control','size' => '5x5']) !!}
                            </div>


                            <!--error message for description field is empty-->

                            @if ($errors->has('description')) <p class="help-block" style="color:red">{{ $errors->first('description') }}</p> @endif


                                    <!-- Upload date-->

                            {!! Form::label('date', 'UploadDate:') !!}
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd" >
                                {!! Form::text('date',null,['class'=>'form-control']) !!}
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>

                            <br>

                            <!-- Upload image file field-->

                            <div class="form-group">

                                <label for="filefield">Upload Image</label>
                                <input type='file' name="filefield" />
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">

                            </div>

                            <!--error message for image field is empty-->

                            @if ($errors->has('filefield')) <p class="help-block" style="color:red">{{ $errors->first('filefield') }}</p> @endif


                                    <!--sumbit button-->

                            <div class="form-group">
                                {!! Form::submit('Update',['class' => 'btn btn-primary']) !!}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>

            <!--ajax for dropdown selection-->

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


@stop