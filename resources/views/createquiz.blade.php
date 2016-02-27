@extends('quizmain')
@section('content')




          <div class="container">
            <div id="loginbox" style="margin-left: 50px" class="mainbox col-md-8 col-md-offset-2 col-sm-9 col-sm-offset-4">
                <div class="panel panel-primary" >
                      <div class="panel-heading">VIEW ALL QUESTIONS</div>

                      <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                          <h3 align="center"><strong><font color="black">ADD TO QUIZ</font></strong></h3>

                          <button id="add" class="btn btn-success" type="button" name="btn" data-toggle="modal" data-target="#viewTable" class="btn btn-info">ADD TO QUIZ</button>

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


      <section class="content">
               <div class="row">
                 <div class="col-md-12">
                   <div class="box">
                     <div class="box-header with-border">

                     </div><!-- /.box-header -->
                     <div class="box-body">
                       <table class="table table-bordered" id="table_ID">
                                  <thead>
                                               <tr>

                                                           <th class="col-sm-2">QuestionID</th>
                                                           <th class="col-sm-2">Question</th>
                                                           <th class="col-sm-2">Answer</th>
                                                           <th class="col-sm-2">Subject</th>






                                               </tr>
                                  </thead>
                                  <tbody>


                                               <tr>


                                                   @foreach($questions as $question)

                                                               <td class="col-sm-2">{{$question->queID}}</td>
                                                               <td class="col-sm-2">{{$question->question}}</td>
                                                               <td class="col-sm-2">{{$question->answer}}</td>
                                                               <td class="col-sm-2">{{$question->subject}}</td>

                                                </tr>

                                                       @endforeach


                                                        </tbody>


                                                </table>

                                               </div>
                                              </div>
                                             </div>
                                            </div>
                                           </section>






                                                        {!! Form::open(array('url'=>'createquiz')) !!}

                                                                 <div id="viewTable" class="modal fade" role="dialog">
                                                                        <div class="modal-dialog"  style="width:40%">

                                                                      <!-- Modal content-->
                                                                         <div class="modal-content">
                                                                          <div class="modal-header">
                                                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                                              <h4 class="modal-title custom_align" id="Heading"><strong><font color="green">Add Question</font></strong></h4>

                                                                          </div>

                                                                         <div class="modal-body">
                                                                           <fieldset>

                                                                            <div class="form-group">
                                                                                    <label for="">Subject</label>
                                                                                     <br/>
                                                                                    <select class="form-control" name="subject" id="subject" style="width: 250px">

                                                                                     @foreach($subject as $sub)
                                                                                     <option></option>
                                                                                      <option value="{{$sub->subject}}" style="width: auto" id="subject">{{$sub->subject}}</option>

                                                                                     @endforeach
                                                                                    </select>

                                                                                 </div>


                                                                                 <div class="form-group">
                                                                                      <label for="">Duration</label>
                                                                                      <br/>
                                                                                      <input type="text" class="form-control" name="duration" style="width: 250px">

                                                                                  </div>


                                                                          </fieldset>
                                                                            </div>
                                                                             <div class="modal-footer">
                                                                               <input class="btn btn-success" name="btn" value="Submit" type="submit">
                                                                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                            </div>
                                                                           </div>

                                                                    {!!  Form::close() !!}

                                                              </div>

                                                          </div>
                                                        </div>
                                                      </section>


      



             <script src="js/jquery.min.js"></script>
             <script src="js/bootstrap.min.js"></script>
             <script src="js/scripts.js"></script>



             <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
             <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>
             <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


               {{-- data table--}}
                  <script>
                    $(document).ready( function () {
                         $('#table_ID').DataTable().columnFilter()(
                          {
                             "lengthMenu": [[2, 4, 6, -1], [2, 4, 6, "All"]]


                          } );

                       });
                  </script>




                         <div class="panel-default">
                              <div class="panel-body">
                                  <table id="table_ID" class="table table-hover table-condensed table-bordered" >
                                      <thead>

                                      <tr class="success">
                                          <th class="col-sm-2">QuizID</th>

                                          <th class="col-sm-2">Subject</th>
                                          <th class="col-sm-2">Duration</th>
                                          <th class="col-sm-2">ADD QUESTION</th>
                                          
                                      </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($quizs as $quiz)
                                          <tr>

                                              <td class="col-sm-2">{{$quiz->quizID}} </td>
                                              <td class="col-sm-2">{{$quiz->subject}} </td>
                                              <td class="col-sm-2">{{$quiz->duration}}</td>
                                             
                                 {!! Form::open(array('url'=>'createquiz')) !!}
                                              <td align="center">
                                                  <a type="button" class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#{{$quiz->quizID}}"></a>

                                                  <div id="{{$quiz->quizID}}" class="modal fade" role="dialog">
                                                      <div class="modal-dialog"  style="width: 50%" >

                                                          <!-- Modal content-->
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                                  <h4 class="modal-title custom_align" id="Heading"><strong><font color="green">QuizID{{$quiz->quizID}}</font></strong></h4>
                                                              </div>

                                                              <div class="modal-body" align="center">
                                                                  <fieldset>

                                                                       <form class="form-horizontal" method="post" action="">
                                                                   <div class="col-md-6">
                                                                      <div class="form-group">
                                                                          <label for="disabledTextInput" class="col-sm-4 control-label">QuizID</label>
                                                                          <div class="col-sm-6">
                                                                              <input type="text"  name="id" id="TextInput" class="form-control" style="width: 250px" value={{$quiz->quizID}}>
                                                                          </div> <br><br>
                                                                      </div>

                                                                     <div class="form-group">
                                                                           <label for="disabledTextInput" class="col-sm-4 control-label">QuestionID</label>
                                                                          <div class="col-sm-6">
                                                                              <select class="form-control"  name="quID" id="quesid" style="width: 250px">
                                                                                  @foreach($questions as $sub)
                                                                                    <option value="{{$sub->queID}}" style="width: auto"  id="quID">{{$sub->queID}}</option>
                                                                                  @endforeach
                                                                              </select>
                                                                          </div><br><br>
                                                                      </div>

                                                                      <div class="form-group">
                                                                        <label for="datetime" class="col-sm-4 control-label"style="font-size: larger">Question</label>
                                                                        <div class="col-sm-6">
                                                                            <select class="form-control" name="question" style="width: 250px" id="question">
                                                                              <option>Select Question</option>

                                                                            </select>
                                                                       </div>
                                                                     </div><br><br><br>

                                                                    <div class="form-group">
                                                                      <label for="text" class="col-sm-4 control-label" style="font-size: larger">Answer</label>
                                                                        <div class="col-sm-6">
                                                                         <input type="text" class="form-control" id="answer" style="width: 250px" name="answer">
                                                                        @if ($errors->has('answer')) <p class="help-block"><font color="red">{{ $errors->first('answer') }}</font></p> @endif
                                                                        </div>
                                                                   </div>
                                                                     
                    <script>

                      $('#quesid').on('change',function(e){
                        console.log(e);

                        var po=e.target.value;
                        console.log(po);
                        $.get('/ques?quesid='+po,function(data){


                           $.each(data,function(index, zoneObj){
                          $('#question').append('<option value="'+zoneObj.question+'">'+zoneObj.question+'</option>');

                        });
                           
                          $.each(data,function(index, zoneObj){
                          document.getElementById("answer").value=zoneObj.answer;


                      });

                     });

                    });

        </script>






                                                         </fieldset>

                                                              </div>
                                                              <div class="modal-footer">
                                                               <input class="btn btn-success" name="btn" value="ADD" type="submit">
                                                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              </div>
                                                          </div>
                                                      </div>

                                 {!!  Form::close() !!}



                                                  </div>




                                                  </div>

                                              </td>
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
     </div>





@stop