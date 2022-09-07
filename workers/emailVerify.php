<?php

$user = $_SESSION['email'];
                    
require_once 'callable.php';
$func= new userController;
$input = array('isVerified' => 1);
$func->updateUser($user, $input);
echo '<script>alert("Success")</script>';
echo '<script>window.location.replace("dashboard.php");</script>';