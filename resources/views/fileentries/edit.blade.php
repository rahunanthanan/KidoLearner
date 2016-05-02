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


    <div class="col-md-2 col-md-offset-0"></div>
    <div class="container w3-animate-zoom">
        <div class="col-md-7 col-md-offset-0">
            <div class="row">
                <div class="col-md-20 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-heading "  style="background-color: #004280; color: white">Course Materials</div>
                        <div class="panel-body" style="background-color: #e6eeff">


                            <br>



    <br><br>

    @if(Session::has('flash_category_empty'))
        <script>
            swal({title: "Error!",  text: "Empty Filed!",type: "error", confirmButtonText: "Cool" });
        </script>

    @endif




    {!! Form::model($entries,['method' => 'PATCH','route'=>['fileentries.update',$entries->id ],'files' => true]) !!}

    <div class="form-group">

        <label for="">Group</label>


        <select class="form-control input-sm" name="category" id="category" readonly>

            @foreach($categories as $category)

                <option value="{{$category->id}}">{{$category->name}}</option>

            @endforeach

        </select>


    </div>


    <div class="form-group">
        <label for="">Activity</label>


        <select class="form-control input-sm" name="subcategory" id="subcategory" readonly>

            @foreach($subcategories as $subcategory)

                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>

            @endforeach


        </select>

    </div>


    <div class="form-group">
        <label for="">Lesson</label>


        <select class="form-control input-sm" name="lesson" id="lesson" readonly>



                @foreach($courses as $course)

                    <option value="{{$course->id}}">{{$course->name}}</option>

                @endforeach


            </select>


        </select>

    </div>



    <br>

    <div class="form-group">

        <label for="filefield">Upload File</label>
        <input type='file' name="filefield"  />
        {{--  <input type='file' name="filefield"  url="{{asset('Myfiles/'.$entries->original_filename )}}"/>--}}
        <input type="hidden" value="{{ csrf_token() }}" name="_token">

    </div>

    @if ($errors->has('filefield')) <p class="help-block" style="color:red">{{ $errors->first('filefield') }}</p> @endif

    <br>


    <div class="form-group">

        <label for="">Previous File</label>
        <br>
        <label for="">{{$entries->original_filename}}</label>

    </div>


    <div class="form-group">
        {!! Form::label('date', 'UploadDate:') !!}

        <input type="date"  name="date" value="<?php echo date('Y-m-d'); ?>" />
    </div>




    <div class="pull-left">
        {!! Form::submit('Update',['class' => 'btn btn-primary']) !!}
    </div>


    <div class=pull-right" >
        <input type="button" class="btn btn-danger"  value="Cancel" data-toggle="tooltip" data-placement="top" title="Cancel Update" onclick="window.location ='/fileentries';">
    </div>



                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop

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


                    $('#lesson').append('<option value="'+lessonObj.id+'">'+lessonObj.name+ '</option>');

                });

            });



        });


    </script>





