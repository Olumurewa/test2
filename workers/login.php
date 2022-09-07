<?php 
require '../views/login.view.php';
use test2\controllers as controllers;

if(isset($_POST['submit'])){  
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $func = new controllers\authController();
    $func->Login($email, $passwordAttempt);

}

