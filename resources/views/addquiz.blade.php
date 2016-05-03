@extends('layouts.app')
@section('content')

        <!-- side navigation bar-->

<div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">


    @include('layouts.adminSidenavbar')


</div>

<!--container-->

<div class="col-md-2 col-md-offset-0"></div>
<div class="container w3-animate-zoom">
    <div class="col-md-7 col-md-offset-0">
        <div class="row">


            <div class="container">
                <div id="loginbox" align="center" class="col-md-8 col-md-offset-0">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Add Question</div>

                      <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                          <h3 align="center"><strong><font color="black">Add Question</font></strong></h3>


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


                      

                     {!! Form::open(array('url'=>'addquiz')) !!}


                                       <div class="form-group">
                                    <label for="">Category</label>
                                     <br/>
                                    <select class="form=control input-sm" name="category" id="category" style="width: 250px">

                                     @foreach($subjects as $sub)
                                     <option></option>
                                      <option value="{{$sub->category}}" style="width: auto" name="category" id="category">{{$sub->category}}</option>

                                     @endforeach
                                    </select>
                                    
                                 </div>

                                <div class="form-group">
                                    <label for="">Subject</label>
                                     <br/>
                                     <select class="form=control input-sm" name="subject" id="subject" style="width: 250px">

                                     <option  style="width: auto"name="subject" id="subject"></option>
                                     <option>computer</option>

                                     </select>
                                 </div>



                          

                             <script>





                                                                                       $('#category').on('change',function(e){
                                                                                       console.log(e);

                                                                                       var po=e.target.value;
                                                                                       console.log(po);
                                                                                       $.get('/formc?category='+po,function(data){




                                                              $.each(data,function(index, zoneObj){
                                                              $('#subject').append('<option value="'+zoneObj.subID+'">'+zoneObj.subID+'</option>');

                                                              });

                                                              });
                                                             });



                                                 </script>



                                      

                                    <button onlick="#" class="btn btn-info"><a href=/managesub>BACK PREVIOUS</a></button>&nbsp;&nbsp;
                                    <button id="ADD" class="btn btn-warning" type="button" name="btn" data-toggle="modal" data-target="#viewTable5" class="btn btn-info">ADD QUESTION</button>

                                     <div id="viewTable5" class="modal fade" role="dialog">
                                         <div class="modal-dialog"  style="width:40%">

                                                                       <!-- Modal content-->
                                                                          <div class="modal-content">
                                                                           <div class="modal-header">
                                                                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                                           <h4 class="modal-title custom_align" id="Heading"><strong><font color="green">ADD QUESTION</font></strong></h4>

                                                                           </div>

                                                                          <div class="modal-body">
                                                                            <fieldset>

                                                                           <div class="form-group">
                                                                             <label for="disabledTextInput" class="col-sm-4 control-label">Question</label>
                                                                             <div class="col-sm-6">
                                                                               <textarea type="text"  name="que1" id="TextInput" class="form-control"></textarea>
                                                                               @if ($errors->has('que1')) <p class="help-block"><font color="red">{{ $errors->first('que1') }}</font></p> @endif
                                                                             </div> <br><br>
                                                                           </div>

                                                                           <br><br>

                                                                            <div class="form-group">
                                                                             <label for="disabledTextInput" class="col-sm-4 control-label">Option 01</label>
                                                                             <div class="col-sm-6">
                                                                               <input type="text"  name="op1" id="TextInput" class="form-control">
                                                                               @if ($errors->has('op1')) <p class="help-block"><font color="red">{{ $errors->first('op1') }}</font></p> @endif
                                                                             </div> <br><br>
                                                                           </div>

                                                                           <br><br>

                                                                            <div class="form-group">
                                                                               <label for="disabledTextInput" class="col-sm-4 control-label">Option 02</label>
                                                                               <div class="col-sm-6">
                                                                                <input type="text"  name="op2" class="form-control"  id="op2">
                                                                                @if ($errors->has('op2')) <p class="help-block"><font color="red">{{ $errors->first('op2') }}</font></p> @endif
                                                                               </div><br><br>
                                                                              </div>

                                                                              <br><br>

                                                                             <div class="form-group">
                                                                               <label for="disabledTextInput" class="col-sm-4 control-label">Option 03</label>
                                                                               <div class="col-sm-6">
                                                                                <input type="text"  name="op3" class="form-control"  id="op3" >
                                                                                @if ($errors->has('op3')) <p class="help-block"><font color="red">{{ $errors->first('op3') }}</font></p> @endif
                                                                               </div><br><br>
                                                                              </div>

                                                                              <br><br>

                                                                             <div class="form-group">
                                                                               <label for="disabledTextInput" class="col-sm-4 control-label">Option 05</label>
                                                                               <div class="col-sm-6">
                                                                                <input type="text"  name="op5" class="form-control"  id="op5">
                                                                                @if ($errors->has('op5')) <p class="help-block"><font color="red">{{ $errors->first('op5') }}</font></p> @endif
                                                                               </div><br><br>
                                                                              </div>

                                                                              <br><br>




                                                                             <div class="form-group">
                                                                             <label for="disabledTextInput" class="col-sm-4 control-label">Answer</label>
                                                                              <div class="col-sm-6">
                                                                               <select class="form=control input-sm" name="answer" id="answer" style="width: 200px">
                                                                                 <option>1</option>
                                                                                 <option>2</option>
                                                                                 <option>3</option>
                                                                                 <option>4</option>

                                                                               </select>
                                                                                @if ($errors->has('answer')) <p class="help-block"><font color="red">{{ $errors->first('answer') }}</font></p> @endif
                                                                            </div>
                                                                          </div>

                                                                          <br><br>



                                                                           </fieldset>
                                                                             </div>
                                                                              <div class="modal-footer">
                                                                                <button type="submit" name="btn" value="Submit" class="btn btn-success">Submit</button>
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                             </div>
                                                                             </div>
                                                                            </div>


                                                               </div>



                       

                         {!!  Form::close() !!}
                      </div>
                </div>



                    <!--container for question-->

                    <div class="col-md-2 col-md-offset-0"></div>
                    <div class="container w3-animate-zoom">
                        <div class="col-md-7 col-md-offset-0">
                            <div class="row">


                        <div class="container">
                            <div id="loginbox" align="center" class="col-md-8" style="left: -13.25%">
                                <div class="panel panel-primary">

                  @foreach($quizz as $quiz)

                     <br>

                    <button id="id" class="btn btn-success" type="button" name="btn" data-toggle="modal" data-target="#{{$quiz->queID}}" value="" class="btn btn-info">QUESTION {{$quiz->queID}} ADDED</button>

                                            {!! Form::open(array('url'=>'addquiz')) !!}


                                                                   <div id="{{$quiz->queID}}" class="modal fade" role="dialog">
                                                                          <div class="modal-dialog"  style="width:40%">

                                                                        <!-- Modal content-->
                                                                           <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                                            <h4 class="modal-title custom_align" id="Heading"><strong><font color="green">QUESTION </font></strong></h4>

                                                                            </div>

                                                                           <div class="modal-body">
                                                                             <fieldset>

                                                                              <div class="form-group">
                                                                                <label for="disabledTextInput" class="col-sm-4 control-label">QuestionID</label>
                                                                                <div class="col-sm-6">
                                                                                  <input type="text"   name="id" id="TextInput" class="form-control" value={{$quiz->queID}}>

                                                                                </div><br><br>
                                                                              </div>

                                                                              <div class="form-group">
                                                                                <label for="disabledTextInput" class="col-sm-4 control-label">Question</label>
                                                                                <div class="col-sm-6">
                                                                                  <input type="text"   name="quee1" id="TextInput" class="form-control" value={{$quiz->question}}>
                                                                                  @if ($errors->has('quee1')) <p class="help-block"><font color="red">{{ $errors->first('quee1') }}</font></p> @endif
                                                                                </div> <br>
                                                                              </div>

                                                                              <br><br>

                                                                               <div class="form-group">
                                                                                <label for="disabledTextInput" class="col-sm-4 control-label">Option 01</label>
                                                                                <div class="col-sm-6">
                                                                                  <input type="text"  name="opp1" id="TextInput" class="form-control" value={{$quiz->option1}}>
                                                                                  @if ($errors->has('opp1')) <p class="help-block"><font color="red">{{ $errors->first('opp1') }}</font></p> @endif
                                                                                </div> <br>
                                                                              </div>

                                                                              <br><br>

                                                                               <div class="form-group">
                                                                                  <label for="disabledTextInput" class="col-sm-4 control-label">Option 02</label>
                                                                                  <div class="col-sm-6">
                                                                                   <input type="text"  name="opp2" class="form-control"  id="op2" value={{$quiz->option2}}>
                                                                                   @if ($errors->has('opp2')) <p class="help-block"><font color="red">{{ $errors->first('opp2') }}</font></p> @endif
                                                                                  </div><br>
                                                                                 </div>

                                                                                 <br><br>

                                                                                <div class="form-group">
                                                                                  <label for="disabledTextInput" class="col-sm-4 control-label">Option 03</label>
                                                                                  <div class="col-sm-6">
                                                                                   <input type="text"  name="opp3" class="form-control"  id="op3" value={{$quiz->option3}} >
                                                                                   @if ($errors->has('opp3')) <p class="help-block"><font color="red">{{ $errors->first('opp3') }}</font></p> @endif
                                                                                  </div><br>
                                                                                 </div>

                                                                                 <br><br>

                                                                                <div class="form-group">
                                                                                  <label for="disabledTextInput" class="col-sm-4 control-label">Option 05</label>
                                                                                  <div class="col-sm-6">
                                                                                   <input type="text"  name="opp5" class="form-control"  id="op5"value={{$quiz->option4}} >
                                                                                   @if ($errors->has('opp5')) <p class="help-block"><font color="red">{{ $errors->first('opp5') }}</font></p> @endif
                                                                                  </div><br>
                                                                                 </div>

                                                                                 <br><br>




                                                                                <div class="form-group">
                                                                                <label for="disabledTextInput" class="col-sm-4 control-label">Answer</label>
                                                                                 <div class="col-sm-6">
                                                                                  <select class="form=control input-sm" name="answerr" id="answerr" style="width: 200px">
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>

                                                                                  </select>
                                                                                   @if ($errors->has('answerr')) <p class="help-block"><font color="red">{{ $errors->first('answerr') }}</font></p> @endif
                                                                               </div>
                                                                             </div>

                                                                             <br><br>



                                                                              </fieldset>
                                                                                </div>
                                                                                 <div class="modal-footer">
                                                                                  <button type="submit" name="btn" value="update" class="btn btn-success">Update</button>
                                                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                                </div>
                                                                               </div>

                                                                      {!!  Form::close() !!}

                                                                </div>




                                                      @endforeach

            </div>



     </div>

</div>
        </div>
    </div>

                    </div>



                </div>

            </div>
        </div>
    </div>
    </div>


@stop