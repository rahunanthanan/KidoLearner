@extends('bookupload')

@section('contentt3')


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/locales.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css"></script>


  <div align="right">
    <button id="category" class="btn btn-success" type="button"  name="btn" data-toggle="modal" data-target="#viewTable" class="btn btn-primary">Add New Category</button>
    <button id="type" class="btn btn-success" type="button" name="btnn" data-toggle="modal" data-target="#viewTablee" class="btn btn-primary">Add New Type</button>
 </div>
 {!! Form::open(array('url'=>'LibraryUpload','method'=>'POST', 'files'=>true)) !!}

                     <div id="viewTable" class="modal fade" role="dialog">
                        <div class="modal-dialog"  style="width:40%">

                                   <!-- Modal content-->
                                      <div class="modal-content">
                                       <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                       <h4 class="modal-title custom_align" id="Heading"><strong><font color="green">Add Category</font></strong></h4>

                                       </div>

                                                       <div class="modal-body">
                                                       <fieldset>



                                                             <div class="form-group">
                                                                 <label for="disabledTextInput" class="col-sm-4 control-label">Add Category</label>
                                                                 <div class="col-sm-6">
                                                                    <input type="text"  name="categorys" id="TextInput" class="form-control">
                                                                    @if ($errors->has('categorys')) <p class="help-block"><font color="red">{{ $errors->first('categorys') }}</font></p> @endif
                                                                 </div> <br><br>
                                                             </div>


                                                           </fieldset>
                                                            </div>
                                                                <div class="modal-footer">
                                                                <input class="btn btn-success" name="btn" value="ADD CATEGORY" type="submit">
                                                                    <button type="button" name="btn" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                 </div>
                                                            </div>
                                                        </div>



                                              </div>
                                            <br>


                       <div id="viewTablee" class="modal fade" role="dialog">
                          <div class="modal-dialog"  style="width:40%">

                                     <!-- Modal content-->
                                        <div class="modal-content">
                                         <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                         <h4 class="modal-title custom_align" id="Heading"><strong><font color="green">Add Type</font></strong></h4>

                                         </div>

                                     <div class="modal-body">
                                        <fieldset>

                                                       <div class="form-group">
                                                         <label for="disabledTextInput" class="col-sm-4 control-label">Category</label>
                                                         <div class="col-sm-6">
                                                        <select class="form=control input-sm" name="catid" id="catid">
                                                            @foreach($categorys as $cat)
                                                               <option></option>
                                                                <option value="{{$cat->category}}" style="width: auto" id="category">{{$cat->category}}</option>

                                                              @endforeach
                                                        </select>
                                                         </div> <br><br>
                                                       </div>



                                                       <div class="form-group">
                                                        <label for="disabledTextInput" class="col-sm-4 control-label">Type Name</label>
                                                        <div class="col-sm-6">
                                                        <input type="text"  name="typename" id="TextInput" class="form-control">
                                                        @if ($errors->has('typename')) <p class="help-block"><font color="red">{{ $errors->first('typename') }}</font></p> @endif
                                                        </div> <br><br>
                                                       </div>


                                                       </fieldset>
                                                       </div>

                                                       <div class="modal-footer">
                                                        <input class="btn btn-success" value="ADD TYPE" name="btn" type="submit">
                                                        <button type="button" class="btn btn-default" name="btn" data-dismiss="modal">Close</button>
                                                        </div>
                                                        </div>
                                                        </div>



                                                </div>

                  <br>

     <div class="container">
            <div id="loginbox" style="margin-left: 50px" class="mainbox col-md-8 col-md-offset-2 col-sm-9 col-sm-offset-4">
                <div class="panel panel-primary" >


                      <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                          <h3 align="center"><strong><font color="black">Add Materials</font></strong></h3>


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



                         <div class="col-md-6">

                   {{--form form blog entry--}}

                                    <div class="form-group">
                                         <label>Category:</label>

                                         <div class="input-group">

                                          <div class="input-group-addon">
                                              <span class="glyphicon glyphicon-pencil"></span>
                                          </div>

                                             <select class="form-control" name="category" id="category">
                                                 @foreach($categorys as $cat)
                                                     <option></option>
                                                     <option value="{{$cat->id}}" style="width: auto" id="category" name="category">{{$cat->category}}</option>

                                                 @endforeach
                                             </select>

                                           {{--<input type="text" class="form-control" name="category">--}}
                                          </div><!-- /.input group -->
                                         @if ($errors->has('category')) <p class="help-block"><font color="red">{{ $errors->first('category') }}</font></p> @endif
                                       </div>




                                       <div class="form-group">
                                             <label>Type:</label>
                                           <div class="input-group">

                                              <div class="input-group-addon">
                                                  <span class="glyphicon glyphicon-save"></span>
                                               </div>
                                                   <select class="form-control" name="type1" id="type1" style="width: 250px">
                                                       <option  style="width: auto" id="type1"></option>
                                                   </select>

                                               <script>

                                                   $('#category').on('change',function(e){
                                                       console.log(e);

                                                       var po=e.target.value;
                                                       console.log(po);
                                                       $.get('/type1?category='+po,function(data){


                                                           $.each(data,function(index, zoneObj){
                                                               $('#type1').append('<option value="'+zoneObj.typeName+'">'+zoneObj.typeName+'</option>');




                                                           });

                                                       });

                                                   });

                                               </script>

                                               {{--<input type="text" class="form-control"  name="type">--}}

                                             </div><!-- /.input group -->
                                             @if ($errors->has('type')) <p class="help-block"><font color="red">{{ $errors->first('type') }}</font></p> @endif
                                       </div>


                                       <div class="form-group">
                                             <label>Name:</label>
                                           <div class="input-group">
                                              <div class="input-group-addon">
                                                  <span class="glyphicon glyphicon-save"></span>
                                               </div>
                                               <input type="text" class="form-control"  name="name">

                                             </div><!-- /.input group -->
                                             @if ($errors->has('name')) <p class="help-block"><font color="red">{{ $errors->first('name') }}</font></p> @endif
                                       </div>

                                   <div class="form-group">
                                         <label>Meterial:</label>
                                       <div class="input-group">
                                         <input type="file" name="attach">
                                         @if ($errors->has('attach')) <p class="help-block"><font color="red">{{ $errors->first('attach') }}</font></p> @endif
                                         <h6><strong><font color="blue">Maximum size for new files: 500 KB, maximum attachments: 1</font></strong></h6>
                                       </div><!-- /.input group -->

                                     </div>
                                </div>
                                        <div class="form-group">
                                               <label>Author:</label>
                                             <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                 </div>
                                                 <input type="text" class="form-control"name="author">

                                               </div><!-- /.input group -->
                                               @if ($errors->has('author')) <p class="help-block"><font color="red">{{ $errors->first('author') }}</font></p> @endif
                                         </div>

                                         <div class="form-group">
                                               <label>Published Date:</label>
                                             <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                 </div>
                                                 <input type="text" class="form-control"name="date">

                                               </div><!-- /.input group -->
                                               @if ($errors->has('date')) <p class="help-block"><font color="red">{{ $errors->first('date') }}</font></p> @endif
                                         </div>

                                            <div class="form-group">
                                                  <label>Published By:</label>
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                       <span class="glyphicon glyphicon-pencil"></span>
                                                    </div>
                                                    <input type="text" class="form-control"name="pb" >
                                                  </div><!-- /.input group -->
                                                  @if ($errors->has('pb')) <p class="help-block"><font color="red">{{ $errors->first('pb') }}</font></p> @endif
                                            </div>

                                               <div class="form-group">
                                                      <label>Description:</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon">
                                                           <span class="glyphicon glyphicon-pencil"></span>
                                                        </div>
                                                        <textarea class="form-control"name="description" ></textarea>

                                                      </div><!-- /.input group -->
                                                      @if ($errors->has('description')) <p class="help-block"><font color="red">{{ $errors->first('description') }}</font></p> @endif
                                                </div>


                                        <button type="submit" name="btn" value="UPLOAD" class="btn btn-success">Submit</button>






                                   </div>





                      </div>
                </div>

                        {!!  Form::close() !!}
            </div>





@stop
