@extends('layouts.app')
@section('content')


        <!-- side navigation bar-->



<div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">


    @include('layouts.adminSidenavbar')


</div>


<div class="container">
    <div id="loginbox" style="margin-left: 150px" class="mainbox col-md-8 col-md-offset-2 col-sm-9 col-sm-offset-4">
        <div class="panel panel-primary" >

<h1 align="center"><font color="purple"><strong>Welcome TO quiz!!!!</strong></font> </h1>


{!!  Form::open(array('url'=>'attemptquiz')) !!}

      
 <div align="center">

  <label for="subject">
    <span>Select Subject</span>
     <select class="form-control" name="subject" id="subject" style="width: 250px">

             <option>Select subject</option>
             <option>Easy maths</option>
             <option>English</option>
             
         
     </select>
  </label>

  <label for="quiz">
    <span>Select Quiz</span>
    <select class="form-control" name="quiz" id="quiz" style="width: 250px">
       <option  style="width: auto" id="subject"></option>
    </select>

  </label>


    
                 
      <button type="submit" name="btn" value="Find Papers" class="btn btn-success">Go To Quiz</button>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
   

  </div>


 


   {!!  Form::close() !!}




                             @if (isset($results))

                              <h1 align="center"><font color="orange"><strong>Let's Start Your Quiz</strong></font> </h1>
                              <br>


    <div align="center">
     <h4><strong><font color="red">Quiz closes in</font></strong></h4>
    <span id="time" ></span> 
     <h4><strong><font color="red">minutes!</font></strong></h4>
    </div>




     

                                       {{ $i=1 }}

                                            @foreach($results as $result)

                            



                                            <div align="center">
                                    

                                                 <h4 align="center"><font color="blue"><strong>Question NO:{{ $i++ }}</strong></font></h4>
                                              
                                                 <h4 align="center"><strong> {{$result->question}}</strong></h4>
                                          
                                                 <input type="radio" name="option" value="option1">  {{$result->option1}}<br>
                                                 <input type="radio" name="option" value="option2"> {{$result->option2}}<br>
                                                 <input type="radio" name="option" value="option3"> {{$result->option3}}<br>
                                                 <input type="radio" name="option" value="option4">{{$result->option4}}<br>
                                            
                                                   
                                               
                                                
                                                 
                                                
                                               
                                                

                                            </div>

                                            @endforeach



                             @endif



</div>

    </div>

</div>
@stop
{{--<script src="jquery-2.1.1.js" language="javascript"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
{{--<script src="{{ asset('/css/js/bootstrap.min.js') }}"></script>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

{{--<!-- <link href="{{ asset('/css/css/bootstrap.min.css') }}" rel="stylesheet">-->--}}

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
{{-- <link href="css/style.css" rel="stylesheet">--}}


<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">



<!-- These links the date picker-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>




<script>

$('#subject').on('change',function(e){
        console.log(e);

        var po=e.target.value;
        console.log(po);
        $.get('/select?subject='+po,function(data){


            $.each(data,function(index, zoneObj){
                $('#quiz').append('<option value="'+zoneObj.quizID+'">'+zoneObj.quizID+'</option>');




            });


        });
    });




</script>

<script>
    function startTimer(duration, display) {
        var start = Date.now(),
                diff,
                minutes,
                seconds;
        function timer() {
            // get the number of seconds that have elapsed since
            // startTimer() was called
            diff = duration - (((Date.now() - start) / 1000) | 0);

            // does the same job as parseInt truncates the float
            minutes = (diff / 60) | 0;
            seconds = (diff % 60) | 0;

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (diff <= 0) {
                // add one second so that the count down starts at the full duration
                // example 05:00 not 04:59
                start = Date.now() + 1000;
            }
        };
        // we don't want to wait a full second before the timer starts
        timer();
        setInterval(timer, 1000);
    }

    window.onload = function () {
        var fiveMinutes = 60 * 5,
                display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };

</script>
