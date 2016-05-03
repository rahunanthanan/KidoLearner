@extends('layouts.app')


@section('content')


        <!-- side navigation bar-->

<div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">


    @include('layouts.parentSidenavbar')


</div>

<!--container-->

<div class="col-md-2 col-md-offset-0"></div>
<div class="container w3-animate-zoom">
    <div class="col-md-9 col-md-offset-1">
        <div class="row">
            <div class="col-md-20 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading "  style="background-color: #004280; color: white">Help Desk</div>
                    <div class="panel-body" style="background-color: #e6eeff">


                        <br>

 
<div id="exTab1" class="container"> 
<ul  class="nav nav-pills">
      <li class="active">
        <a  href="#1a" data-toggle="tab">Complaint</a>
      </li>
      <li><a href="#2a" data-toggle="tab">Doubts</a>
      </li>
      <li><a href="#3a" data-toggle="tab">Requests</a>
      </li>

    </ul>

<br><br><br>

 <div class="container">
            <div id="loginbox" style="margin-left: 50px" class="mainbox col-md-7">
                <div class="panel panel-primary" >
                      <div class="panel-heading">VIEW REPLY</div>

      <div class="tab-content clearfix">
        <div class="tab-pane active" id="1a">
           <div class="box-body">
                  <table class="table table-bordered" id="table_ID">
                             <thead>
                                          <tr>

                                                      <th class="col-sm-2">ID</th>
                                                      <th class="col-sm-2">Complaint</th>
                                                     
                                                      <th class="col-sm-2">View Reply</th>





                                          </tr>
                             </thead>
                             <tbody>


                                          <tr>


                                              @foreach($helps as $help)

                                                          <td class="col-sm-2">{{$help->HID}}</td>
                                                          <td class="col-sm-2">{{$help->description}}</td>
                                                        
                                                          

                         <td align="center">
                            <a type="button" class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#{{$help->HID}}"></a>

                            <div id="{{$help->HID}}" class="modal fade" role="dialog">
                                <div class="modal-dialog"  style="width: 40%" >

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                            <h4 class="modal-title custom_align" id="Heading"><strong><font color="green">View Reply</font></strong></h4>
                                        </div>
                                        <div class="modal-body">

                                            <fieldset>

                                               
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Complaint</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" readonly name="id" id="TextInput" class="form-control" value="{{$help->description}}">
                                                    </div><br><br>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Reply</label>
                                                    <div class="col-sm-6">
                                                        <input type="text"  name="complaint" id="TextInput" class="form-control" value="{{$help->reply}}">
                                                       
                                                    </div><br><br>
                                                </div>

                                              
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            
                                        </div>
                                    </div>
                                </div>



                            </div>




                          </tr>

                     @endforeach


                             </tbody>


                     </table>

                    </div>
        </div>
        <div class="tab-pane" id="2a">
          <div class="box-body">
                  <table class="table table-bordered" id="table_ID2">
                             <thead>
                                          <tr>

                                                      <th class="col-sm-2">ID</th>
                                                      <th class="col-sm-2">Doubts</th>
                                                   
                                                      <th class="col-sm-2">View Reply</th>





                                          </tr>
                             </thead>
                             <tbody>


                                          <tr>


                                              @foreach($doubts as $doubt)

                                                          <td class="col-sm-2">{{$doubt->HID}}</td>
                                                          <td class="col-sm-2">{{$doubt->description}}</td>
                                                          
                                                          

                         <td align="center">
                            <a type="button" class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#viewTable5"></a>

                            <div id="viewTable5" class="modal fade" role="dialog">
                                <div class="modal-dialog"  style="width: 40%" >

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                            <h4 class="modal-title custom_align" id="Heading"><strong><font color="green">View Reply</font></strong></h4>
                                        </div>
                                        <div class="modal-body">

                                            <fieldset>

                                               
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Doubt</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" readonly name="id" id="TextInput" class="form-control" value="{{$doubt->description}}">
                                                    </div><br><br>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Reply</label>
                                                    <div class="col-sm-6">
                                                        <input type="text"  name="complaint" id="TextInput" class="form-control" value="{{$doubt->reply}}">
                                                       
                                                    </div><br><br>
                                                </div>

                                              
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            
                                        </div>
                                    </div>
                                </div>



                            </div>




                          </tr>

                     @endforeach


                             </tbody>


                     </table>

                    </div>
        </div>
        <div class="tab-pane" id="3a">
          <div class="box-body">
                  <table class="table table-bordered" id="table_ID3">
                             <thead>
                                          <tr>

                                                      <th class="col-sm-2">ID</th>
                                                      <th class="col-sm-2">Title</th>
                                                      <th class="col-sm-2">RequestType</th>
                                                      <th class="col-sm-2">Description</th>
                                                    
                                                      <th class="col-sm-2">View Reply</th>





                                          </tr>
                             </thead>
                             <tbody>


                                          <tr>


                                              @foreach($req as $re)

                                                          <td class="col-sm-2">{{$re->HID}}</td>
                                                          <td class="col-sm-2">{{$re->title}}</td>
                                                          <td class="col-sm-2">{{$re->request_type}}</td>
                                                          <td class="col-sm-2">{{$re->description}}</td>
                                                       
                                                          

                         <td align="center">
                            <a type="button" class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#viewTable6"></a>

                            <div id="viewTable6" class="modal fade" role="dialog">
                                <div class="modal-dialog"  style="width: 40%" >

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                            <h4 class="modal-title custom_align" id="Heading"><strong><font color="green">View Reply</font></strong></h4>
                                        </div>
                                        <div class="modal-body">

                                            <fieldset>

                                               
                                                 <div class="form-group">
                                                    <label class="col-sm-4 control-label">Description</label>
                                                    <div class="col-sm-6">
                                                        <input type="text"  name="complaint" id="TextInput" class="form-control" value="{{$re->description}}">
                                                       
                                                    </div><br><br>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Reply</label>
                                                    <div class="col-sm-6">
                                                        <input type="text"  name="complaint" id="TextInput" class="form-control" value="{{$re->reply}}">
                                                       
                                                    </div><br><br>
                                                </div>


                                               

                                              
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            
                                        </div>
                                    </div>
                                </div>



                            </div>




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
                </div>
            </div>
        </div>
    </div>
</div>






<!-- Bootstrap core JavaScript
                ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


            
                 


                {{--links using for data tables--}}

             <script src="js/jquery.min.js"></script>
             <script src="js/bootstrap.min.js"></script>
             <script src="js/scripts.js"></script>



             <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
             <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>
             <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


             
                



@stop
