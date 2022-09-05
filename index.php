<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!isset($_SESSION['email'])){
    echo '<script>alert("Unauthenticated")</script>';
    echo '<script>window.location.replace("workers/login.php");</script>';
}
//DO a standard Login, Logout, Otp Login, Email verification, Password change, Password reset, Phone number verification system
