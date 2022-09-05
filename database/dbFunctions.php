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
            $details[]=$stmt->fetch(PDO::FETCH_ASSOC);
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
}