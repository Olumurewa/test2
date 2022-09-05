<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = parse_url($_SERVER['REQUEST_URI']);
if (isset($url['query'])){
    require 'hashGenerator.php';
    $instance = new hashGenerator;
    try{
        $result = password_verify($url['query'], $instance->hashQuery->queryString);
        if($result){
            require 'controllers/userController.php';
            $ins = new userController;
            $input['isVerified']=1;
            $ins->updateUser($_SESSION['email'], $input['isVerified']);
            echo '<script type="text/javascript">alert("Verified");</script>';
            echo '<script>window.location.replace("../login.php");</script>';
        }else{
            echo '<script>ERROR!</script>';
        }
    }catch(Exception $e){
        $error = "Error: " . $e->getMessage();
        echo '<script type="text/javascript">alert("'.$error.'");</script>';
    }

}else{
    if(!isset($_SESSION['dancer'])){
        echo '<script>alert("Unauthenticated")</script>';
        echo '<script>window.location.replace("workers/login.php");</script>';
    }
}

//DO a standard Login, Logout, Otp Login, Email verification, Password change, Password reset, Phone number verification system
