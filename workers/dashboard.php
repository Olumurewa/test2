<?php
require '../views/dashboard.view.php';
require 'callable.php';


if(!isset($_SESSION['email'])){
    echo '<script>alert("Unauthenticated")</script>';
    echo '<script>window.location.replace("login.php");</script>';
}



if(isset($_POST['login'])){
    $begin = new authController;
    $begin->Logout();
}