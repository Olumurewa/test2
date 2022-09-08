<?php

use Test2\controllers as Controllers;
// require 'caller.php';

if(isset($_POST['submit']))
{  
    $otp = !empty($_POST['otp']) ? trim($_POST['otp']) : null;


    $instance = new Controllers\OtpController;
    $instance->confirmOtp($otp);

    unset($_SESSION['otpUID']);
    

}