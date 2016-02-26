@extends('layout.template')


@section('content')



    <h1>Kido Learner Subject</h1>
    {{--<a href="{{url('/subCategory/create')}}" class="btn btn-success">Create Subject</a>--}}

 {{--   <td><a href="{{url('subCategory/create')}}" class="btn btn-primary">Add Subject</a></td>--}}

    <td><a href="{{route('subCategory.create',$cat->id)}}" class="btn btn-primary">Add Subject</a></td>

   {{-- <td><a href="/subCategory/create/{{$cat->id}}" class="btn btn-primary">Add Subject</a></td>--}}

    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Name</th>
            <th colspan="5">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ( $subcat as $book )
            <tr>
                <td>{{  $book->name  }}</td>


                <td><a href="{{route('subCategory.edit',$book->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['category.destroy', $book->id]]) !!}

                   {{-- <input type="hidden" value="{{ $cat->id }}" name="catid">--}}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}


                    {!! Form::close() !!}


                </td>
            </tr>

        @endforeach




        </tbody>

    </table>

@endsection