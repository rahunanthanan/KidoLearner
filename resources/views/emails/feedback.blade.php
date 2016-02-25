
@extends('layout.template')

@section('content')


    <h1 align="center"> Feedback </h1>

{{--    {!! Form::open(['url'=>'contact_request'])!!}


    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <div class="form-group">
        {!! Form::label('first_name','First Name*')!!}
        {!! Form::text('first_name',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!!Form::label ('email', 'E-mail Address*')!!}
        {!!Form::email ('email',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form:: textarea ('message', '', array('placeholder' => 'Message', 'class' => 'form-control', 'id' => 'message', 'rows' => '4' )) !!}
    </div>



    </div>--}}
  {{--  @if(Session::has('message'))
        <p class="alert"><font color="green">{{ Session::get('message') }}</font></p>
    @endif--}}
    @include('sweet::alert')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">

                    <form class="form-vertical" enctype="multipart/form-data" method="post" action="{{ url('emails') }}"/>
                        <fieldset>
                            <legend class="text-center header">Feed Back</legend>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input  name="first_name" type="text" placeholder="First Name" class="form-control" required/>

                                </div>
                            </div>


                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-envelope bigicon"></i></span>
                                <div class="col-md-8">
                                    <input type="email"  name="email" type="text" placeholder="Email Address" class="form-control" required>
                                </div>
                            </div>



                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-pencil bigicon "></i></span>
                                <div class="col-md-8">
                                    <textarea class="form-control"  name="message" placeholder="Feel free  to tell about KidoLearner" rows="7" required minlength="10"></textarea>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    {!! Form::submit('Submit', array('class' => 'btn btn-primary'))!!}
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">

                                    {!! Form:: close()!!}
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

