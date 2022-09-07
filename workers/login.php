<?php 
// require 'caller.php';
use Test2\controllers as Controllers;


require '../views/login.view.php';


if(isset($_POST['submit'])){  
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $func = new Controllers\AuthController;
    $func->login($email, $passwordAttempt);

}

