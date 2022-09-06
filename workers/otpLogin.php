<?php
session_start();
require '../views/otpLogin.view.php';
require '../controllers/otpController.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cont = new OtpController;
$cont->otpGenerator(1);

if (isset($_POST['login'])){
    $otp = !empty($_POST['otp']) ? trim($_POST['otp']) : null;
    
    $cont->confirmOtp($otp);

}


