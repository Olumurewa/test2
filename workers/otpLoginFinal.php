<?php

require_once 'callable.php';

if(isset($_POST['submit'])){  
    $otp = !empty($_POST['otp']) ? trim($_POST['otp']) : null;


    $instance = new OtpController;
    $instance->confirmOtp($otp);

    unset($_SESSION['otpUID']);
    

}