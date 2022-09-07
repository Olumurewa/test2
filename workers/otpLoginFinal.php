<?php

use test2\controllers as controllers;
require 'caller.php';

if(isset($_POST['submit'])){  
    $otp = !empty($_POST['otp']) ? trim($_POST['otp']) : null;


    $instance = new controllers\OtpController;
    $instance->confirmOtp($otp);

    unset($_SESSION['otpUID']);
    

}