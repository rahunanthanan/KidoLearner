<!DOCTYPE html>
<html lang="en">
<head>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">

    <!-- These links the date picker-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

   
</head>
<body >
<div class="row">
    <nav class="navbar navbar-inverse">
        <div class="container">
             <ul class="nav navbar-nav navbar-right">
                     <li><a href="#">Contact Us</a></li>
                    <li><a href="#">About Us</a></li>
                    <li>
                    <a>
                    <?php
                    $dt = new DateTime();
                    echo $dt->format('Y-m-d ');
                    ?>
                    </a>
                    </li>
              </ul>
        </div>
    </nav>
</div>

{{--ministry logo--}}
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-7">

    </div>
    <div class="col-md-4">
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
    </div>
</div>

 
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">

           <div class="row">




                 <div class="col-md-3">

                    <div class="list-group">
                      <a class="list-group-item active">
                      Main Menu
                      </a>
                       <a href="/helpdesk" class="list-group-item"><span class="glyphicon glyphicon-star"></span>HelpDesk<span class="badge"></span></a>
                       <a href="/viewhelpdesk" class="list-group-item"><span class="glyphicon glyphicon-star"></span>ViewReply<span class="badge"></span></a>
                    </div>

                  </div>


                   <div class="col-md-7">

                   <br><br>

                     @yield('content3')

                   </div>


            </div>
       </div>

      <div class="col-md-1"></div>
     </div>
    
</body>
</html>