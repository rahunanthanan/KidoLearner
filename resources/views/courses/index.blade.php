@extends('layout.template')


@section('content')
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Isolated Version of Bootstrap, not needed if your site already used Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>



    <h1>Kido Learner Lessons</h1>


    <a href="{{url('/courses/create')}}" class="btn btn-success">Create Lesson</a>

    <div class="form-group">
        <label for="">Group</label>
        <select class="form-control input-sm" name="category" id="category">

            @foreach($categoryname as $category)

                <option value="{{$category->id}}">{{$category->name}}</option>

            @endforeach
        </select>


    </div>

    <div class="form-group">
        <label for="">Activity</label>
        <select class="form-control input-sm" name="subcategory" id="subcategory">

            <option value="" onclick="categorizeCourse"></option>


        </select>


    </div>



    <hr>
    <table class="table table-striped table-bordered table-hover">
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

                </td>
            </tr>
        @endforeach


        </tbody>

    </table>

@stop


