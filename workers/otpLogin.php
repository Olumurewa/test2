<?php

require 'callable.php';

if(isset($_POST['submit'])){  
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    
    $func = new userController();
    $func->getUser($email);
    $instance = new OtpController;
    $user = $_SESSION['userID'];
    $instance->otpGenerator($user);
    require '../views/otpLogin.view.php';

}


