<html>
<body>
@extends('layout.template')

@section('content')
<!-- Blade Template engine -->
{!! Form::open(['url'=>'feedback_request']) !!} <!--contact_request is a router from Route class-->

{{--<ul class="errors">
    @foreach($errors->all('<li>:message</li>') as $message)
        {{ $message }}
    @endforeach
</ul>--}}

         <h1>Feed back</h1>


        <div class="form-group">
            {!! Form::label('first_name','First Name*')!!}
            {!! Form::text('first_name',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!!Form::label ('last_name', 'Last Name*' )!!}
            {!!Form::text ('last_name',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!!Form::label ('phone_number', 'Phone Number')!!}
            {!!Form::text ('phone_number',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!!Form::label ('email', 'E-mail Address*')!!}
            {!!Form::email ('email',null,['class'=>'form-control']) !!}
        </div>

  {{--   { !! Form::label ('subject', 'Subject')!!}--}}

{{--{ !! Form::select ('subject', array(
'1' => '1',
'2' => '2',
'3' => '3',
'4' => '4'), '1' ) !!}--}}


{!!Form::label ('message', 'Message*') !!}

{!!Form::textarea ('message',null,['class'=>'form-control']) !!}

{!!Form::reset('Clear', ['class' => 'btn btn-sucess'])!!}
{!!Form::submit('Send', ['class' => 'btn btn-sucess'])!!}

{!! Form::close() !!}

</body>
</html>