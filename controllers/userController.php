<?php
require_once '../database/dbFunctions.php';



class userController{
    

    /**
     * function to register new users
     * 
     * @param string $email
     * @param string $phoneNumber
     * @param string $password
     */
    public function registerUser($email,$phoneNumber,$password){
        $func = new dbFunctions;
        try{
            $func->storeUsers($email,$phoneNumber,$password,0);
        }catch(Exception $e){
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
    public function updateUser($email, $input){
        $func = new dbFunctions;
        try{
            $func->emailSearch($email); //fetching user information from email

            if($func->emailSearch->details){
                $newemail = !empty($input['email']) ? $input['email'] : $func->emailSearch->details['email'];
                $phoneNumber = !empty($input['phoneNumber']) ? $input['phoneNumber'] : $func->emailSearch->details['phoneNumber'];
                $password = !empty($input['password']) ? $input['password'] : $func->emailSearch->details['password'];
                $isVerified = !empty($input['isVerified']) ? $input['isVerified'] : $func->emailSearch->details['isVerified'];

                $func->updateUser($email,$newemail,$phoneNumber,$password,$isVerified);
            }
        }catch(Exception $e){
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }

    /**
     * function to get user data 
     * 
     * @param int $id
     */
    public function fetchUser($id){
        $func= new dbFunctions;
        try{
            $func->idSearch($id);
        }catch(Exception $e){
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }

    /**
     * function to get user data 
     * 
     * @param string $email
     */
    public function getUser($email){
        $func= new dbFunctions;
        try{
            $func->emailSearch($email);
            
        }catch(Exception $e){
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }



    /**
     * function to delete user information
     * 
     * @param string $email
     */
    public function deleteUser($email){
        $func= new dbFunctions;
        try{
            $func->deleteUsers($email);
        }catch(Exception $e){
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }
}