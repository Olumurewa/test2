<?php
use Test2\controllers as Controllers;


//require 'caller.php';
if(isset($_POST['submit'])){  
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    
    $func = new controllers\UserController();
    $func->getUser($email);
    $instance = new controllers\OtpController;
    $user = $_SESSION['userID'];
    $instance->otpGenerator($user);
    require '../views/otpLogin.view.php';

}


