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
                if($validPassword)
                {
                    $_SESSION['userID'] = $user['userID'];
                    $_SESSION['email'] = $email;
                    if($user['isVerified'] == 0){
                        echo '<script>alert("You have not verified your E-mail")</script>';
                        echo '<script>window.location.replace("dashboard.php");</script>';
                    }
                } 
                else
                {
                    echo '<script>alert("invalid username or password")</script>';
                }
            }
            
        }catch(PDOException $e) 
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
        
    }
    public function Logout(){
        unset($_SESSION['email']);
        unset($_SESSION['userID']);
        echo '<script>alert("Logged Out")</script>';
        echo '<script>window.location.replace("login.php");</script>';
    }


}