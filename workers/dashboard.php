<?php
require '../views/dashboard.view.php';
use test2\controllers as controllers;


if(!isset($_SESSION['email'])){
    echo '<script>alert("Unauthenticated")</script>';
    echo '<script>window.location.replace("login.php");</script>';
}



if(isset($_POST['login'])){
    $begin = new controllers\authController;
    $begin->Logout();
}