@extends('quizmain')
@section('content')

  <div class="container">
            <div id="loginbox" style="margin-left: 50px" class="mainbox col-md-8 col-md-offset-2 col-sm-9 col-sm-offset-4">
                <div class="panel panel-primary" >
                      <div class="panel-heading">ADD QUESTION</div>

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


                      @foreach($subjects as $sub)

                     {!! Form::open(array('url'=>'addquiz')) !!}


                                       <div class="form-group">
                                          <label>Category:</label>
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                              <span class="glyphicon glyphicon-user"></span>
                                            </div>
                                            <input type="text"  class="form-control"  name="category" value={{$sub->category}}>

                                          </div><!-- /.input group -->

                                        </div>


                                       <div class="form-group">
                                         <label>Subject:</label>
                                         <div class="input-group">
                                           <div class="input-group-addon">
                                             <span class="glyphicon glyphicon-pencil"></span>
                                           </div>
                                           <input type="text"  class="form-control"  name="subject" value={{$sub->subject}}>

                                         </div><!-- /.input group -->

                                       </div>




                                      <div class="form-group">
                                         <label>Duration:</label>
                                         <div class="input-group">
                                           <div class="input-group-addon">
                                             <span class="glyphicon glyphicon-home"></span>
                                           </div>
                                           <input type="text"  class="form-control" name="duration" value={{$sub->duration}}>

                                         </div><!-- /.input group -->

                                       </div>

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



                        @endforeach

                         {!!  Form::close() !!}
                      </div>
                </div>


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



@stop