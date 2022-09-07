<?php

use test2\controllers as controllers;

if(isset($_POST['submit'])){  
    $otp = !empty($_POST['otp']) ? trim($_POST['otp']) : null;


    $instance = new controllers\OtpController;
    $instance->confirmOtp($otp);

    unset($_SESSION['otpUID']);
    

}