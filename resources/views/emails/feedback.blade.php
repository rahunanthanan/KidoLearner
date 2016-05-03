
@extends('layouts.app')

@section('content')



{{--    <div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">


        @include('layouts.parentSidenavbar')


    </div>--}}



    <!--container-->

    <div class="col-md-2 col-md-offset-0"></div>
    <div class="container w3-animate-zoom">
        <div class="col-md-7 col-md-offset-0">
            <div class="row">
                <div class="col-md-20 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-heading "  style="background-color: #004280; color: white">Feedback</div>
                        <div class="panel-body" style="background-color: #e6eeff">


                            <br>





                    <!--form for sent feedback-->

                    <form class="form-vertical" enctype="multipart/form-data" method="post" action="{{ url('emails') }}"/>


                    <fieldset>

                        <!--first name-->
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input  name="first_name" type="text" placeholder="First Name" class="form-control" required/>

                                <!--error message for first name validation-->
                                @if ($errors->has('first_name')) <p class="help-block" style="color:red">{{ $errors->first('first_name') }}</p> @endif


                            </div>
                        </div>


                        <!--email address field-->
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-envelope bigicon"></i></span>
                            <div class="col-md-8">
                                <input type="email"  name="email" type="text" placeholder="Email Address" class="form-control" required>

                                <!--error message for email validation-->
                                @if ($errors->has('email')) <p class="help-block" style="color:red">{{ $errors->first('email') }}</p> @endif


                            </div>
                        </div>


                        <!--message field-->
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-pencil bigicon "></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control"  name="message" placeholder="Feel free  to tell about KidoLearner" rows="7" required minlength="10"></textarea>
                            </div>
                        </div>

                        <!--submit button-->

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                {!! Form::submit('Submit', array('class' => 'btn btn-primary'))!!}
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">

                                {!! Form:: close()!!}
                            </div>
                        </div>
                    </fieldset>


                    </div>
                </div>
            </div>
        </div>
       </div>
        </div>

        @endsection
<style>
    .header {
        color: #36A0FF;
        font-size: 27px;
        padding: 10px;
    }

    .bigicon {
        font-size: 30px;
        color: #36A0FF;
    }
</style>

