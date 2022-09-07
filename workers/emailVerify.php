<?php
use test2\controllers as controllers;

$user = $_SESSION['email'];
                    
require_once 'callable.php';
$func= new controllers\userController;
$input =  1;
$func->verifyUser($user, $input);
echo '<script>alert("Success")</script>';
echo '<script>window.location.replace("dashboard.php");</script>';