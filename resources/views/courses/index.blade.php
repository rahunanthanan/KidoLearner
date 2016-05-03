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

                        <!--path to create lesson page-->

                        <div class="col-xs-8">
                            <a href="{{url('/courses/create')}}" class="btn btn-success">Create Lesson</a>
                        </div>

                        <!--search field-->

                        <div class="col-sm-1">
                            <input type="text"  align="right" id="search" placeholder="Type to search Courses">
                        </div>

                        <br><br><br>



                        <!--Group selection-->

                        <div class="form-group">
                            <label for="">Group</label>

                            <select class="form-control input-sm" name="category" id="category">

                                @foreach($categoryname as $category)

                                    <option value="{{$category->id}}">{{$category->name}}</option>

                                @endforeach
                            </select>


                        </div>


                        <!--Activity selection-->


                        <div class="form-group">
                            <label for="">Activity</label>
                            <select class="form-control input-sm" name="subcategory" id="subcategory">

                                <option value="" onclick="categorizeCourse"></option>


                            </select>


                        </div>

                        <!--Table for created course information-->

                        <hr>
                        <table class="table table-striped table-bordered table-hover" id="table">
                            <thead>
                            <tr class="bg-info">
                                {{-- <th>Id</th>--}}
                                <th>Name</th>
                                {{--<th>Category</th>--}}
                                <th>Description</th>
                                <th colspan="5">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($courses as $book)
                                <tr>
                                    {{--<td>{{ $book->id }}</td>--}}
                                    <td>{{ $book->name }}</td>
                                    {{--<td>{{ $book->category }}</td>--}}
                                    <td>{{ $book->description}}</td>
                                    <td><img src="{{asset('Uploads/'.$book->img)}}" height="35" width="30"></td>
                                    <td><a href="{{url('courses',$book->id)}}" class="btn btn-primary">Read</a></td>
                                    <td><a href="{{route('courses.edit',$book->id)}}" class="btn btn-warning">Update</a></td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['courses.destroy', $book->id]]) !!}



                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}



                                        <script>

                                         /*  ajax for dropdownselection*/

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

                                            <!-- script for search course-->

                                            var $rows = $('#table tr');
                                            $('#search').keyup(function() {
                                                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                                                $rows.show().filter(function() {
                                                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                                                    return !~text.indexOf(val);
                                                }).hide();
                                            });


                                        </script>

                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                        @endforeach

                    </div>

                    </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


