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






    <div class="col-xs-8">
        <a href="{{url('/fileentries/create')}}" class="btn btn-success">Upload File</a>
    </div>

    <div class="col-sm-1">
        <input type="text"  align="right" id="search" placeholder="Type to search Lessons">
    </div>

    <br><br><br>









    <table class="table table-striped table-bordered table-hover"  id="table">
        <thead>
        <tr class="bg-info">

            <th>Course Name</th>
            <th>Course Materials Name</th>
            <th>UploadDate</th>
            <th colspan="5">Actions</th>
        </tr>
        </thead>
        <tbody>




        @foreach ($entries as $entry)

            <tr>

                <td> {{$entry->lesson}}</td>

                <td><a href="{{'Myfiles/'.$entry->original_filename}}">{{$entry->original_filename}}</a></td>

                <td>{{ $entry->date }}</td>

              {{--  <td><a href="{{route('fileentries.edit',$entry->id)}}" class="btn btn-warning">Update</a></td>--}}

                    {!! Form::open(['method' => 'DELETE', 'route'=>['fileentries.destroy', $entry->id]]) !!}



                   <td> {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}</td>



            </tr>
            @endforeach







        </tbody>

    </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    {!! Form::close() !!}

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



                        var $rows = $('#table tr');
                        $('#search').keyup(function() {
                            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                            $rows.show().filter(function() {
                                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                                return !~text.indexOf(val);
                            }).hide();
                        });



                    </script>




@stop


