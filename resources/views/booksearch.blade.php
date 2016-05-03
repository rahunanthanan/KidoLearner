@extends('layouts.app')
@section('content')
    {{--quizmain--}}


        <!-- side navigation bar-->

<div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">


    @include('layouts.parentSidenavbar')


</div>





<div class="col-md-2 col-md-offset-0"></div>
<div class="container w3-animate-zoom">
    <div class="col-md-7 col-md-offset-0">
        <div class="row">


            <div class="container">
                <div id="loginbox" align="center" class="col-md-8 col-md-offset-0">
                    <div class="panel panel-primary" >
                        <div class="panel-heading">Library Materials</div>


{{--container box--}}

 <div class="container" >
        <div id="loginbox" style="margin-left:-2.75%" class="mainbox col-md-8 col-md-offset-2" >
            <div class="panel panel-info">


                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>


                         <h5 align="center"><strong><font color="">Library Materials can be downloaded from here</font></strong></h5>
                         <br><hr style="height:1px;border:none;color:deepskyblue;background-color:deepskyblue;" /><br>

                         <br>



<h4 align="left"><strong><font color="blue">Library Materials</font></strong></h4>


<label id="lableid"></label>
    {!!  Form::open(array('url'=>'booksearch')) !!}

       <div class="form-group">
         <label for="course" class="col-sm-6 control-label">Category</label>
           <div class="col-sm-6" style="margin-right: 30px">
            <select class="form-control input-sm" name="category" id="course">
             <option>Select Category</option>
              <option>book</option>
             <option>magazines</option>

             </select>
           </div>
        </div>

         <br><br>

         <div class="form-group">
           <label for="exam" class="col-sm-6 control-label">Type</label>
             <div class="col-sm-6" style="margin-right: 30px">
               <select class="form-control input-sm" name="type" id="exam">
               <option>Select Type</option>
               <option>story book</option>
               <option>maths</option>

               </select>
              </div>
          </div>

         <br><br><br><br>

           <div class="form-group">
                 <div class="col-sm-6">
                   <button type="submit" name="btn" value="Find Books" class="btn btn-success">Find Books</button>
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 </div>
            </div>


   {!!  Form::close() !!}

         <br><br>




   <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">

                </div><!-- /.box-header -->
                <div class="box-body">
               <table id="table_ID" class="display" cellspacing="0" width="100%">
                           <thead>
                                                <tr>


                                                    <th class="col-sm-2">Category</th>
                                                    <th class="col-sm-2">Type</th>
                                                    <th class="col-sm-2">Name</th>
                                                    <th class="col-sm-2">Author</th>
                                                    <th class="col-sm-2">Description</th>
                                                    <th class="col-sm-2">Download</th>


                                                </tr>
                                            </thead>
                                            <tbody>




                                          @if (isset($results))

                                             @foreach($results as $result)



                                                      <tr>
                                                       

                                                        <td class="col-sm-2">{{$result->category}}</td>
                                                        <td class="col-sm-2">{{$result->type}}</td>
                                                        <td class="col-sm-2">{{$result->name}}</td>
                                                        <td class="col-sm-2">{{$result->author}}</td>
                                                        <td class="col-sm-2">{{$result->description}}</td>
                                                        <td class="col-sm-2">  <a href="{{route('getentry', $result->attach)}}">{{$result->original_filename}}</a>



                                            @endforeach
                                            {{--exception--}}
                                                        @if ( count($results)==0)
                                                         <h5><strong><font color="red">Please select category and type</font></strong></h5>
                                                        @endif

                                         @endif



                                  </tr>

                                </tbody>

                         </table>

                        </div>
                       </div>
                     </div>
                   </div>
                 </section>



   <br>

   

                    {{--links needed for data table--}}

                          <script src="js/jquery.min.js"></script>
                          <script src="js/bootstrap.min.js"></script>
                          <script src="js/scripts.js"></script>



                          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
                          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                          <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>
                          <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


                  <script>
                    $(document).ready( function () {
                         $('#table_ID').DataTable().columnFilter()(
                          {
                             "lengthMenu": [[2, 4, 6, -1], [2, 4, 6, "All"]]


                          } );

                       });
                  </script>


</div>
</div>
</div>
</div>
@stop
