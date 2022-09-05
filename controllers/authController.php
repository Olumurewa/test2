<?php
require '../database/dbFunctions.php';
require '../models/User.php';

class authController{

    public function Login($email, $passwordAttempt)
    {
        $db = new DbConn();
        $sql = "SELECT * FROM `users` WHERE email = :email";
        try{
            $stmt = $db->conn->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user === false)
            {
                echo '<script>alert("invalid email or password")</script>';
            } 
            else
            {
                $validPassword = password_verify($passwordAttempt, $user['password']);
            }
            if($validPassword)
            {
                $_SESSION['email'] = $email;
                $_SESSION['userID'] = $user['userID'];
                dbFunction::OtpGenerator($user['userID']);
                echo '<script>window.location.replace("verify.php");</script>';
                exit; 
            } 
            else
            {
                echo '<script>alert("invalid username or password")</script>';
            }
        }catch(PDOException $e) 
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
        
    }


}