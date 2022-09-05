<?php
require '../database/dbFunctions.php';
require '../models/User.php';



class userController{
    
    public function registerUser($email,$phoneNumber,$password){
        $func = new dbFunctions;
        try{
            $func->storeUsers($email,$phoneNumber,$password,0);
        }catch(Exception $e){
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        } 

    }

    public function updateUser($email, $input){
        $func = new dbFunctions;
        try{
            $func->emailSearch($email);
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

    public function fetchUser($id){
        $func= new dbFunctions;
        try{
            $func->idSearch($id);
        }catch(Exception $e){
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }

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