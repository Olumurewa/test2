<?php 
require '../views/login.view.php';
require 'callable.php';

if(isset($_POST['submit'])){  
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $func = new authController();
    $func->Login($email, $passwordAttempt);

}

