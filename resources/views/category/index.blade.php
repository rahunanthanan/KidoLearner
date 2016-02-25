@extends('layout.template')


@section('content')

    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">





    <h1>Kido Learner Courses</h1>
    <a href="{{url('/category/create')}}" class="btn btn-success">Add Group</a>





    @if(Session::has('flash_category_delete'))
        <script>
            swal({title: "Are you sure?",
                text: "Your will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!" },

                    function ConfirmDelete(){

                        var x = confirm("Are you sure you want to delete?");

                        if (x)
                            return true;
                        else
                            return false; });



        </script>

    @endif






    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Name</th>
            <th colspan="5">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $book)
            <tr>
                <td>{{ $book->name }}</td>

                <td><a href="{{route('subCategory.show',$book->id)}}" class="btn btn-primary">Add Subject</a></td>
                <td><a href="{{route('category.edit',$book->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE','onsubmit' => 'return ConfirmDelete()', 'route'=>['category.destroy', $book->id]]) !!}



                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach




        </tbody>

    </table>


    <script>



    </script>


@endsection