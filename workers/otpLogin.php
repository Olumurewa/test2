<?php
use test2\controllers as controllers;


require 'caller.php';
if(isset($_POST['submit'])){  
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    
    $func = new controllers\userController();
    $func->getUser($email);
    $instance = new controllers\OtpController;
    $user = $_SESSION['userID'];
    $instance->otpGenerator($user);
    require '../views/otpLogin.view.php';

}


