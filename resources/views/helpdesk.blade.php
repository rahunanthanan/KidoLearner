
@extends('layouts.app')
@section('content')


        <!-- side navigation bar-->

<div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">


    @include('layouts.parentSidenavbar')


</div>

<!--container-->

<div class="col-md-2 col-md-offset-0"></div>
<div class="container w3-animate-zoom">
    <div class="col-md-7 col-md-offset-0">
        <div class="row">
            <div class="col-md-20 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading "  style="background-color: #004280; color: white">Course Materials</div>
                    <div class="panel-body" style="background-color: #e6eeff">


                        <br>





<h2 align="center"><font color="red" ><strong>Student Help Desks</strong></font></h2>

<h3 align="center"><font color="orange" ><strong>We are here to help you !!!!</strong></font></h3>

<img align="center" src="http://www.it-winners.com/image/page/help-desk.jpg" width="100%" >

<h4 align="center"><font color="black" ><strong>Genral Information</strong></font></h4>
<br>
<h5><strong><font color="green">Student Help Desk provides free support for questions about:</font> </strong></h5>
<br><br>


<div class="container"></div>
<div id="exTab1" class="container"> 
<ul  class="nav nav-pills">
      <li class="active">
        <a  href="#1a" data-toggle="tab">Complaints</a>
      </li>
      <li><a href="#2a" data-toggle="tab">Doubts</a>
      </li>
      <li><a href="#3a" data-toggle="tab">Request</a>
      </li>
      
    </ul>

    <br><br>


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

      <div class="tab-content clearfix">
        <div class="tab-pane active" id="1a">
         
          {!! Form::open(array('url'=>'helpdesk')) !!}
            <div class="form-group input-group" style="margin-top: 10px">
                <span style="width: 155px"  class="input-group-addon">ParentID</span>
                
                <input type="text" class="form-control "id="id" required name="id" style="width: 350px;"/>              
                                      
            </div>

             <div class="form-group input-group" style="margin-top: 10px">
                <span style="width: 155px"  class="input-group-addon">Complaint</span>
                
                <textarea type="text" class="form-control "id="complaint" required name="complaint" style="width: 350px;"/></textarea>               
                                      
            </div>

            <div class="container-fluid">
              <div class="form-actions span4 offset1" style="margin-top: 10px">
                 &nbsp;&nbsp;&nbsp;&nbsp;
              <button type="submit" name="btn" value="Send" class="btn btn-success">Send</button>
             </div>
           </div>
{!!  Form::close() !!}
        </div>



        <div class="tab-pane" id="2a">
          {!! Form::open(array('url'=>'helpdesk')) !!}
         <div class="form-group input-group" style="margin-top: 10px">
                <span style="width: 155px"  class="input-group-addon">ParentID</span>
                
                <input type="text" class="form-control "id="id" required name="id" style="width: 350px;"/>              
                                      
            </div>

             <div class="form-group input-group" style="margin-top: 10px">
                <span style="width: 155px"  class="input-group-addon">Doubts</span>
                
                <textarea type="text" class="form-control "id="doubt" required name="doubt" style="width: 350px;"/></textarea>               
                                      
            </div>

            <div class="container-fluid">
              <div class="form-actions span4 offset1" style="margin-top: 10px">
                 &nbsp;&nbsp;&nbsp;&nbsp;
              <button type="submit" name="btn" value="SendDoubt"  class="btn btn-success">SendDoubt</button>
             </div>
           </div>
         {!!  Form::close() !!}
        </div>


        <div class="tab-pane" id="3a">
          {!! Form::open(array('url'=>'helpdesk')) !!}
            <div class="form-group input-group" style="margin-top: 10px">
                <span style="width: 155px"  class="input-group-addon">ParentID</span>
                
                <input type="text" class="form-control "id="id" required name="id" style="width: 350px;"/>              
                                      
            </div>

            <div class="form-group input-group" style="margin-top: 10px">
                <span style="width: 155px"  class="input-group-addon">Title</span>
                
                <input type="text" class="form-control "id="title" required name="title" style="width: 350px;"/>              
                                      
            </div>

            <div class="form-group input-group" style="margin-top: 10px">
                <span style="width: 155px"  class="input-group-addon">RequestType</span>
                
                <select type="text" class="form-control "id="type" required name="type" style="width: 350px;"/>            
                <option>Request Certificate</option>
                <option>Request Answer</option>
                 </select>                 
            </div>

             <div class="form-group input-group" style="margin-top: 10px">
                <span style="width: 155px"  class="input-group-addon">Description</span>
                
                <textarea type="text" class="form-control "id="description" required name="description" style="width: 350px;"/></textarea>               
                                      
            </div>

            <div class="container-fluid">
              <div class="form-actions span4 offset1" style="margin-top: 10px">
                 &nbsp;&nbsp;&nbsp;&nbsp;
              <button type="submit"  name="btn" value="SendRequest" class="btn btn-success">SendRequest</button>
             </div>
           </div>
          {!!  Form::close() !!}
        </div>
          
      </div>
  </div>





<!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<br><br>


   <div align="center">
    <h4><font color="green" ><strong>OR</strong></font></h4>
    <h5><font color="#3385ff" ><strong><a href="mailto:rahunanthanan@gmail.com?subject=YourSubject&body=Test Body" >Contact Admin </a> </strong></font></h5>
   <div>

<br><br><br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(function () {
      $('.btnSendEmail').click(function (event) {
        var email = 'gobisliit@gmail.com';
         window.location = 'mailto:' + email + '?subject=' + subject + '&body=' + emailBody;
      });
    });
  </script>




@stop



