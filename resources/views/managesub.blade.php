@extends('quizmain')
@section('content')






          <div class="container">
            <div id="loginbox" style="margin-left: 50px" class="mainbox col-md-8 col-md-offset-2 col-sm-9 col-sm-offset-4">
                <div class="panel panel-primary" >
                  <div class="panel-heading">MANAGE SUBJECTS</div>

                      <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                          <h4 align="center"><strong><font color="black">Subject Listing</font></strong></h4>


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


                                                                              <th class="col-sm-2">Category</th>
                                                                              <th class="col-sm-2">SubjectID</th>
                                                                              <th class="col-sm-2">Subject</th>
                                                                              <th class="col-sm-2">Duration</th>
                                                                              <th class="col-sm-2">Action</th>
                                                                              <th class="col-sm-2">Action</th>
                                                                              <th class="col-sm-2">Action</th>



                                                                  </tr>
                                                     </thead>
                                                     <tbody>


                                                                  <tr>


                                                                      @foreach($subjects as $sub)

                                                                                  <td class="col-sm-2">{{$sub->category}}</td>
                                                                                  <td class="col-sm-2">{{$sub->subID}}</td>
                                                                                  <td class="col-sm-2">{{$sub->subject}}</td>
                                                                                  <td class="col-sm-2">{{$sub->duration}}</td>
                                                                                  <td class="col-sm-2"><a href="/addquiz">Manage questions</a></td>
                                                                                  <td class="col-sm-2"><button id="Edit" class="btn btn-warning" type="button" name="btn" data-toggle="modal" data-target="#{{$sub->subID}}" class="btn btn-info">Edit</button></td>
                                                                                  <td class="col-sm-2"><button id="Delete" class="btn btn-danger" type="button" name="btn" data-toggle="modal" data-target="#viewTable3" class="btn btn-danger">Delete</button></td>


                                                          {!! Form::open(array('url'=>'managesub')) !!}

                                                                 <div id="{{$sub->subID}}" class="modal fade" role="dialog">
                                                                        <div class="modal-dialog"  style="width:40%">

                                                                      <!-- Modal content-->
                                                                         <div class="modal-content">
                                                                          <div class="modal-header">
                                                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                                          <h4 class="modal-title custom_align" id="Heading"><strong><font color="green">Edit Subject</font></strong></h4>

                                                                          </div>

                                                                         <div class="modal-body">
                                                                           <fieldset>

                                                                           <div class="form-group">
                                                                            <label for="disabledTextInput" class="col-sm-4 control-label">ID</label>
                                                                            <div class="col-sm-6">
                                                                              <input type="text"  name="id" id="TextInput" class="form-control" value={{$sub->subID}}>

                                                                            </div> <br><br>
                                                                          </div>

                                                                           <div class="form-group">
                                                                             <label for="disabledTextInput" class="col-sm-4 control-label">Category</label>
                                                                            <div class="col-sm-6">
                                                                             <input type="text"  name="category" id="TextInput" class="form-control" value={{$sub->category}}>
                                                                             @if ($errors->has('category')) <p class="help-block"><font color="red">{{ $errors->first('category') }}</font></p> @endif
                                                                             </div>
                                                                           </div>

                                                                           <br><br><br>

                                                                            <div class="form-group">
                                                                            <label for="disabledTextInput" class="col-sm-4 control-label">Subject</label>
                                                                             <div class="col-sm-6">
                                                                              <input type="text"  name="subject" id="TextInput" class="form-control" value={{$sub->subject}}>
                                                                               @if ($errors->has('subject')) <p class="help-block"><font color="red">{{ $errors->first('subject') }}</font></p> @endif
                                                                           </div>
                                                                         </div>

                                                                         <br><br>

                                                                            <div class="form-group">
                                                                              <label for="disabledTextInput" class="col-sm-4 control-label">Duration</label>
                                                                              <div class="col-sm-6">
                                                                               <input type="text"  name="duration" class="form-control"  id="duration" value={{$sub->duration}}>
                                                                               @if ($errors->has('duration')) <p class="help-block"><font color="red">{{ $errors->first('duration') }}</font></p> @endif
                                                                              </div><br><br>
                                                                             </div>



                                                                          </fieldset>
                                                                            </div>
                                                                             <div class="modal-footer">
                                                                               <input class="btn btn-success" value="Submit" type="submit">
                                                                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                            </div>
                                                                           </div>

                                                                    {!!  Form::close() !!}

                                                              </div>


                                                          </tr>

                                                    @endforeach


                                                     </tbody>


                                             </table>

                                            </div>
                                           </div>
                                          </div>
                                         </div>
                                        </section>





                      </div>
                </div>
            </div>
     </div>



@stop