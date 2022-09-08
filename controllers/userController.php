<?php
namespace Test2\controllers;


use test2\database as data;



class UserController
{
    

    /**
     * function to register new users
     * 
     * @param string $email
     * @param string $phoneNumber
     * @param string $password
     */
    public function registerUser($email,$phoneNumber,$password)
    {
        $func = new data\dbFunctions;
        try
        {
            $func->storeUsers($email,$phoneNumber,$password,0);
        }
        catch(\Exception $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        } 

    }


    /**
     * 
     * function to fetch and update user details
     * 
     * @param string $email
     * @param string $input
     */
    public function updateUser($email, $input)
    {
        $func = new data\dbFunctions;
        try
        {
            $db = new data\DbConn();
            $sql = "SELECT * FROM `users` WHERE email = :email";
                $stmt = $db->conn->prepare($sql);
                $stmt->bindValue(':email', $email);
                $stmt->execute();
                $user = $stmt->fetch(\PDO::FETCH_ASSOC); //fetching user information from email
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
                $newemail = !empty($input['email']) ? $input['email'] : $user['email'];
                $phoneNumber = !empty($input['phoneNumber']) ? $input['phoneNumber'] : $user['phoneNumber'];
                $password = !empty($input['password']) ? $input['password'] : $user['password'];
                $isVerified = !empty($input['isVerified']) ? $input['isVerified'] : $user['isVerified'];

                $func->updateUser($email,$newemail,$phoneNumber,$password,$isVerified);
        
        }
        catch(\Exception $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }
    /**
     * fnction to set verification status
     * 
     * @param string $email
     * @param int $input
     */
    public function verifyUser($email, $input)
    {
        $func = new data\dbFunctions;
        try
        {
            $db = new data\DbConn();
            $sql = "SELECT * FROM `users` WHERE email = $email";
                $stmt = $db->conn->prepare($sql);
                $stmt->execute();
                $user = $stmt->fetch(\PDO::FETCH_ASSOC); //fetching user information from email
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
                $newemail =  $user['email'];
                $phoneNumber = $user['phoneNumber'];
                $password =  $user['password'];
                $isVerified = $input;

                $func->updateUser($email,$newemail,$phoneNumber,$password,$isVerified);
        
        }
        catch(\Exception $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }

    /**
     * function to get user data 
     * 
     * @param int $id
     */
    public function fetchUser($id)
    {
        $func= new data\dbFunctions;
        try
        {
            $func->idSearch($id);
        }
        catch(\Exception $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }

    /**
     * function to get user data 
     * 
     * @param string $email
     */
    public function getUser($email)
    {
        $func= new data\dbFunctions;
        try
        {
            $func->emailSearch($email);
            
        }
        catch(\Exception $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }



    /**
     * function to delete user information
     * 
     * @param string $email
     */
    public function deleteUser($email)
    {
        $func= new data\dbFunctions;
        try
        {
            $func->deleteUsers($email);
        }
        catch(\Exception $e)
        {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }
}