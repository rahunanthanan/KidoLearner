@extends('layouts.app')

@section('content')


        <!-- side navigation bar-->

<div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">


    @include('layouts.adminSidenavbar')


</div>


<!--container for view feedbacks-->

<div class="col-md-5 col-md-offset-0"></div>
<div class="container w3-animate-zoom"  >


    <div class="col-md-20 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading "  style="background-color: #004280; color: white">Feedback</div>
            <div class="panel-body" style="background-color: #e6eeff">


                <br>

                <!--all sent feedback information-->

                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr class="bg-info">
                        <th>Time</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($feed as $book)
                        <tr>

                            <td>{{ $book->dateAndTime }}</td>
                            <td>{{ $book->name }}</td>
                            <td> <a href="mailto:{{ $book->email_addr }}">{{ $book->email_addr }}    </a> </td>
                            <td>{{ $book->comment}}</td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>
</div>



@stop




