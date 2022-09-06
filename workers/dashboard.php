<?php
session_start();
require '../views/dashboard.view.php';
require '../controllers/authController.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(!isset($_SESSION['email'])){
    echo '<script>alert("Unauthenticated")</script>';
    echo '<script>window.location.replace("login.php");</script>';
}



if(isset($_POST['submit'])){
    $begin = new authController;
    $begin->Logout();
}