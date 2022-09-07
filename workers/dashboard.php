<?php
use Test2\controllers as Controllers;
require '../views/dashboard.view.php';


// require 'caller.php';


if(!isset($_SESSION['email'])){
    echo '<script>alert("Unauthenticated")</script>';
    echo '<script>window.location.replace("login.php");</script>';
}



if(isset($_POST['login'])){
    $begin = new Controllers\AuthController;
    $begin->logout();
}