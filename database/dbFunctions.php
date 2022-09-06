<?php

require 'db.php';

class dbFunctions{
    
    public function storeUsers($email,$phoneNumber,$password,$isVerified){
        $db = new DbConn();
        $sql = "INSERT INTO `users` (email, phoneNumber, password, isVerified) VALUES (:email,:phoneNumber, :password,:isVerified)";
        try
        {
            $stmt = $db->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phoneNumber', $phoneNumber);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':isVerified', $isVerified);
           
            $stmt->execute();
        }catch(PDOException $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }

    public function  deleteUsers($email){
        $db = new DbConn();
        $sql = "DELETE FROM users WHERE email=?";
        try{
            $stmt = $db->conn->prepare($sql);
            $stmt->execute([$email]);
        }catch(PDOException $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
       
    }

    public function emailSearch($email){
        $db = new DbConn();
        $sql = "SELECT * FROM users WHERE email=?";
        try{
            $stmt = $db->conn->prepare($sql);
            $stmt->execute([$email]);
            $details=$stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['userID'] = $details['userID'];
        }catch(PDOException $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }

    public function idSearch($id){
        $db = new DbConn();
        $sql = "SELECT * FROM users WHERE id=?";
        try{
            $stmt = $db->conn->prepare($sql);
            $stmt->execute([$id]);
        }catch(PDOException $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }

    public function updateUser($email,$newemail,$phoneNumber,$password,$isVerified){
        $db = new DbConn();
        $sql = "UPDATE users SET email=:email, phoneNumber=:phoneNumber, password=:password isVerified=:isVerified WHERE email=:email";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute($newemail,$phoneNumber,$password,$isVerified,$email);
    }

    public function storeOtp($otp,$userID){
        $isExpired = 0; 
        $db = new DbConn();
        try
        {
            $otpstore = $db->conn->prepare("INSERT INTO `otp` (otp, isExpired, userID) 
            VALUES ($otp,$isExpired,$userID)");
            $otpstore->execute();
        }
        catch(PDOException $e) 
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }

    public function findOtp($otp){
        $db = new DbConn();
        try
        {
            $sql = "SELECT * FROM `otp` WHERE otp = :otp";
            $stmt = $db->conn->prepare($sql);
            $stmt->bindValue(':otp', $otp);
            $stmt->execute();
            $stmt->fetch(PDO::FETCH_ASSOC);

        }catch(PDOException $e) 
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }

    public function verifyOtp($otp){
        $db = new DbConn();
        $isExpired = 1;
        $sql = "UPDATE otp SET otp=:otp, isExpired=:isExpired WHERE otp=:otp";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute($otp,$isExpired);

    }
}