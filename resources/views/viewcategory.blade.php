
@extends('bookupload')

@section('contentt3')

 <div class="container">
        <div id="loginbox" style="margin-left: 50px" class="mainbox col-md-8 col-md-offset-2 col-sm-9 col-sm-offset-4">
            <div class="panel panel-info" >


                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                         <h3 align="center"><strong><font color="green">View All Categories</font></strong></h3>
                         <br><hr style="height:1px;border:none;color:deepskyblue;background-color:deepskyblue;" /><br>
                          <h5 align="center"><strong><font color="green"></font></strong></h5>


<br>


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
                                                      <th class="col-sm-2">Number of types</th>





                                          </tr>
                             </thead>
                             <tbody>


                                          <tr>


                                              @foreach($categorys as $category)

                                                          <td class="col-sm-2">{{$category->category}}</td>

                                              @foreach($catcount as $cou)
                                                          <td class="col-sm-2">{{$cou->cont}}</td>







                                          </tr>

                                             @endforeach


                             </tbody>


                     </table>

                    </div>
                   </div>
                  </div>
                 </div>
                </section>


                {{--links using for data tables--}}

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


</div>
</div>
</div>
</div>
@stop