<?php
use Test2\controllers as Controllers;

//require 'caller.php';

$user = $_SESSION['email'];
                    
require_once 'callable.php';
$func= new controllers\UserController;
$input =  1;
$func->verifyUser($user, $input);
echo '<script>alert("Success")</script>';
echo '<script>window.location.replace("dashboard.php");</script>';