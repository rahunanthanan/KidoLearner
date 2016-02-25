<!DOCTYPE html>
<html lang="en">
<head>
    {{--<script src="jquery-2.1.1.js" language="javascript"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{--<script src="{{ asset('/css/js/bootstrap.min.js') }}"></script>--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    {{--<!-- <link href="{{ asset('/css/css/bootstrap.min.css') }}" rel="stylesheet">-->--}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {{-- <link href="css/style.css" rel="stylesheet">--}}


    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">



    <!-- These links the date picker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    {{--drop down--}}








</head>
<body >


<hr style="height:0.7px;border:none;color: #d3d3d3;background-color: #d3d3d3;" />




@yield('content2')

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">

           <div class="row">






            <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">

                       <div class="row">




                                <div class="col-md-3">

                                       <div class="list-group">
                                          <a class="list-group-item active">
                                         Main Menu
                                         </a>
                                          <a href="/viewcategory" class="list-group-item"><span class="glyphicon glyphicon-eye-open"></span>View Category<span class="badge"></span></a>
                                               <a href="/librarytype" class="list-group-item"><span class="glyphicon glyphicon-eye-open"></span>View Type<span class="badge"></span></a>
                                          <a href="/LibraryUpload" class="list-group-item"><span class="glyphicon glyphicon-upload"></span>Upload Materials<span class="badge"></span></a>
                                          <a href="/viewmaterials" class="list-group-item"><span class="glyphicon glyphicon-eye-open"></span>View Materials<span class="badge"></span></a>


                                </div>


                        </div>






                   <div class="col-md-7">

                     @yield('contentt3')

                   </div>


            </div>
      </div>

      <div class="col-md-1"></div>
    </div>
  </div>
  </div>
  </div>
</body>
</html>

