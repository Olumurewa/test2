<?php
require_once '../database/dbFunctions.php';

/**
 * class for authentication management
 * 
 */
class authController{


    /**
     * function to perform Login operation and 
     * @param string $email
     * @param string $passwordAttempt
     */
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


    /**
     * 
     * function to perform Logout operation
     */
    public function Logout(){
        session_unset();
        session_destroy();
        header("location:login.php");
    }


}