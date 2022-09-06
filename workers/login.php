<?php 
session_start();
require '../views/login.view.php';
require '../controllers/authController.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['submit'])){  
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $func = new authController();
    $func->Login($email, $passwordAttempt);

}

if(isset($_POST['otp'])){ 
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    require '../controllers/userController.php';
    $func = new userController();
    if($func->getUser($email)){
        header('Location: workers/otpLogin');
    }
}