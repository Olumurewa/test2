<?php
namespace Test2\database;



/**
 * Class to contain database query functions
 */
class dbFunctions{
    
    /**
     * funtion to store collect and store user info in the database
     * 
     * @param string $email
     * @param string $phoneNumber
     * @param string $password
     * @param int isVerified
     * 
     */
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
        }catch(\PDOException $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }

    /**
     * function to delete users from the database
     * 
     * @param string $email
     * 
     */
    public function  deleteUsers($email){
        $db = new DbConn();
        $sql = "DELETE FROM users WHERE email=?";
        try{
            $stmt = $db->conn->prepare($sql);
            $stmt->execute([$email]);
        }catch(\PDOException $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
       
    }


    /**
     * function to find a user from the database via the user email
     * 
     * @param string $email
     * 
     */
    public function emailSearch($email){
        $db = new DbConn();
        $sql = "SELECT * FROM users WHERE email=:email";
        try{
            $stmt = $db->conn->prepare($sql);
            $stmt->bindParam(':email',$email);
            $stmt->execute();
            $details=$stmt->fetch(\PDO::FETCH_ASSOC);
            // echo '<pre>';
            // var_dump($details);
            // echo '</pre>';
            // $_SESSION['userID'] = $details['userID'];
            // $_SESSION['email'] = $details['email'];
            // $_SESSION['phoneNumber'] = $details['phoneNumber'];
            // $_SESSION['password'] = $details['password'];
            // $_SESSION['isVerified'] = $details['isVerified'];
            //var_dump($details);
        }catch(\PDOException $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }

    /**
     * function to find a user from the database via the user id
     * 
     * @param int $id
     * 
     */
    public function idSearch($id){
        $db = new DbConn();
        $sql = "SELECT * FROM users WHERE id=?";
        try{
            $stmt = $db->conn->prepare($sql);
            $stmt->execute([$id]);
        }catch(\PDOException $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }


    /**
     * function to update database user information
     * 
     * @param string $email
     * @param string $phoneNumber
     * @param string $password
     * @param int isVerified
     * 
     */
    public function updateUser($email,$newemail,$phoneNumber,$password,$isVerified){
        $db = new DbConn();
        $sql = "UPDATE users SET email=$newemail, phoneNumber=$phoneNumber, password=$password isVerified=$isVerified WHERE email=$email)";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute();
    }


    /**
     * function to save otp in the database
     * 
     * @param int $otp
     * @param int $userID
     * 
     */

    public function storeOtp($otp,$userID){
        $isExpired = 0; 
        $db = new DbConn();
        try
        {
            $otpstore = $db->conn->prepare("INSERT INTO `otp` (otp, isExpired, userID) 
            VALUES ($otp,$isExpired,$userID)");
            $otpstore->execute();
        }
        catch(\PDOException $e) 
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }


    /**
     * function to search for otp
     * 
     * @param int $otp
     */
    public function findOtp($otp){
        $db = new DbConn();
        try
        {
            $sql = "SELECT * FROM `otp` WHERE otp = :otp";
            $stmt = $db->conn->prepare($sql);
            $stmt->bindValue(':otp', $otp);
            $stmt->execute();
            $details = $stmt->fetch(\PDO::FETCH_ASSOC);
            $_SESSION['otp'] = $details['isExpired'];
            $_SESSION['otpUID'] = $details['userID'];


        }catch(\PDOException $e) 
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }

    /**
     * Function to update otp expiry status
     * 
     * @param int $otp
     */
    public function verifyOtp($otp){
        $db = new DbConn();
        $isExpired = 1;
        $sql = "UPDATE otp SET otp=$otp, isExpired=$isExpired WHERE otp=$otp";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute();

    }
}