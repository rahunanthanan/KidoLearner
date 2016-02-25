@extends('layout.template')

@section('content')


    <form action="{{route('addentry', [])}}" method="post" enctype="multipart/form-data" url="getentry">
        <input type="file" name="filefield">
        <input type="submit">
    </form>

    <h1> Pictures list</h1>
    <div class="row">
        <ul class="thumbnails">
            @foreach($entries as $entry)
                <div class="col-md-2">
                    <div class="thumbnail">
                        <img src="{{route('getentry', $entry->filename)}}" alt="ALT NAME" class="img-responsive" />

                        {{--<td><a href="{{route('courses.edit',$book->id)}}" class="btn btn-warning">Update</a></td>--}}
                        <div class="caption">
                            <p>{{$entry->original_filename}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>

@endsection