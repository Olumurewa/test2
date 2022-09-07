<?php 
use test2\controllers as controllers;

require '../views/register.view.php';
require 'caller.php';

if(isset($_POST['submit'])){ 
    try{
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $pass = $_POST['password'];
        $password = password_hash($pass, PASSWORD_BCRYPT);

        $instance = new controllers\userController();
        $instance->registerUser($email,$phoneNumber,$password);
    }catch(\PDOException $e)
    {
        $error = "Error: " . $e->getMessage();
        echo '<script type="text/javascript">alert("'.$error.'");</script>';
    }
 }

?>