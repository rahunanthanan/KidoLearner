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

{{--firt black label--}}
<div class="row">
    <div class="col-md-12">

        <h3 class="text-muted text-center">
            Children Web Learning Application
        </h3>


    </div>
</div>

{{--ministry logo--}}
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-7">

    </div>
    {{--<div class="col-md-4">
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
    </div>--}}
</div>



<div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <ul class="nav nav-pills">

             <li role="presentation" class="dropdown">
                                 {!! Form ::open() !!}

                                 		<select id="category" name="category" class="form-control input-sm" style="{width: 130px; height: 300px}"  onchange="javascript:location.href = this.value;">
                                             <option>Module</option>
                                             <option value="managesub">Manage Subjects</option>
                                             <option value="addsubject">Add Subjects</option>
                                             <option value="createquiz">Add To Quiz</option>

                                         </select>

                                 {!! Form ::close() !!}
                           </li>

             </ul>



        </div>


</div>
<hr style="height:0.7px;border:none;color: #d3d3d3;background-color: #d3d3d3;" />

@yield('content')


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="row">
    <nav class="navbar navbar-inverse">
        <div class="container">
            <a class="navbar-brand">CHILDREN LEARNING SYSTEM</a>
        </div>
    </nav>
</div>


</body>
</html>