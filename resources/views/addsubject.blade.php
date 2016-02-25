@extends('quizmain')
@section('content')




          <div class="container">
            <div id="loginbox" style="margin-left: 50px" class="mainbox col-md-8 col-md-offset-2 col-sm-9 col-sm-offset-4">
                <div class="panel panel-primary" >
                      <div class="panel-heading">ADD SUBJECTS</div>

                      <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                          <h3 align="center"><strong><font color="black">Add Duration</font></strong></h3>


                          <br><hr style="height:1px;border:none;color:deepskyblue;background-color:deepskyblue;" /><br>


                        @if(Session::has('message1'))

                             <div class="alert alert-danger">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             <strong>Fail!</strong> {{ Session::get('message1', '') }}
                             </div>

                        @endif


                        @if(Session::has('message2'))

                             <div class="alert alert-success">
                               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                               <strong>Success!</strong> {{ Session::get('message2', '') }}
                             </div>
                        @endif



                         <div class="col-md-8">

                   {{--form form blog entry--}}
                           {!! Form::open(array('url'=>'addsubject','method'=>'POST', 'files'=>true)) !!}


                           <div class="form-group">
                                    <label for="">Category</label>
                                     <br/>
                                    <select class="form=control input-sm" name="category" id="category" style="width: 250px">

                                     @foreach($subjects as $sub)
                                     <option></option>
                                      <option value="{{$sub->category}}" style="width: auto" id="category">{{$sub->category}}</option>

                                     @endforeach
                                    </select>
                                    @if ($errors->has('category')) <p class="help-block"><font color="red">{{ $errors->first('category') }}</font></p> @endif
                                 </div>



                          <div class="form-group">
                             <label for="">Subject</label>
                             <br/>
                            <select class="form=control input-sm" name="subject" id="subject" style="width: 250px">
                                <option>Easy Maths</option>
                                <option>Biology</option>
                                <option>English</option>


                                {{--<option  style="width: auto" id="subject" name="subject"></option>--}}
                            </select>
                             @if ($errors->has('subject')) <p class="help-block"><font color="red">{{ $errors->first('subject') }}</font></p> @endif
                         </div>

                             <script>





                                                                                       $('#category').on('change',function(e){
                                                                                       console.log(e);

                                                                                       var po=e.target.value;
                                                                                       console.log(po);
                                                                                       $.get('/formc?category='+po,function(data){




                                                              $.each(data,function(index, zoneObj){
                                                              $('#subject').append('<option value="'+zoneObj.id+'">'+zoneObj.subject+'</option>');

                                                              });

                                                              });
                                                             });



                                                 </script>


                                        <div class="form-group">
                                             <label>Duration:</label>
                                             <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                 </div>
                                                 <input type="text" class="form-control"name="duration" style="width: 200px">&nbsp;&nbsp;&nbsp;<label style="color: green">MINS</label>

                                               </div><!-- /.input group -->
                                               @if ($errors->has('duration')) <p class="help-block"><font color="red">{{ $errors->first('duration') }}</font></p> @endif
                                         </div>

                                        <button type="submit" name="btn" value="Submit" class="btn btn-success">Submit</button>




                                      {!!  Form::close() !!}


                                   </div>





                      </div>
                </div>
            </div>
     </div>
@stop