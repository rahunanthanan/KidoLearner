<!--This is a blade template that goes in email message to site administrator-->
<?php

use Illuminate\Support\Facades\Input;

$first_name = Input::get('first_name');
$email = Input::get ('email');
$message = Input::get ('message');
$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
$message = Input::get('message');

?>

<h2>Welcome Kidolearner Feedback</h2>

<p>


    First name:     <?php echo ($first_name);?> <br><br>
    Email address:  <?php echo ($email);?> <br><br>
    Message:        <?php echo ($message);?><br><br>
    Date:           <?php echo($date_time);?><br><br>
    User IP address: <?php echo($userIpAddress);?><br><br>


</p>