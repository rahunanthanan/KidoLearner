@extends('layout.template')

@section('content')


    <h1 align="center"> Feedback </h1>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Time</th>
            <th>Name</th>
            <th>Email</th>
            <th>Comment</th>
            <th colspan="5">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($feed as $book)
            <tr>

                <td>{{ $book->dateAndTime }}</td>
                <td>{{ $book->name }}</td>
                <td> <a href="mailto:{{ $book->email_addr }}">{{ $book->email_addr }}    </a> </td>
                <td>{{ $book->comment}}</td>


               {{--<td><a href="{{url('courses',$book->id)}}" class="btn btn-primary">Read</a></td>--}}

                {!! Form::open(['method' => 'DELETE', 'route'=>['emails.destroy', $book->id]]) !!}



                   <td> {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}</td>
                    {!! Form::close() !!}


            </tr>

        @endforeach

        </tbody>

    </table>

@endsection




