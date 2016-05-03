@extends('layouts.app')
@section('content')


        <!-- side navigation bar-->

<div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">


    @include('layouts.adminSidenavbar')


</div>

<!--container-->





             <div class="container">
            <div id="loginbox" style="margin-left: 150px" class="mainbox col-md-8 col-md-offset-2 col-sm-9 col-sm-offset-4">
                <div class="panel panel-primary" >
                      <div class="panel-heading">ADD SUBJECTS</div>

                      <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                          <h3 align="center"><strong><font color="black">Add Subject</font></strong></h3>


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
                                    <input type="text"  name="subject" class="form-control"  id="subject" style="width: 250px" >
                                    @if ($errors->has('subject')) <p class="help-block"><font color="red">{{ $errors->first('subject') }}</font></p> @endif
                                 </div>



                          

                             


                                        

                                        <button type="submit" name="btn" value="Submit" class="btn btn-success">Submit</button>




                                      {!!  Form::close() !!}


                                   </div>





                      </div>
                </div>
            </div>
     </div>
@stop