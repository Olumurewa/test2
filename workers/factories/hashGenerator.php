<?php
require 'controllers/userController.php';
class hashGenerator{
    private $SecretKey = "Rings around the roses";
   

    public function hashQuery(){
        global $queryString;
        $queryString = $this->SecretKey.rand(1000, 9999);
        $hashstring = password_hash($queryString, PASSWORD_BCRYPT);
        $uri = 'localhost/test2?hash='.$hashstring;
        echo '<script type="text/javascript">alert("'.$uri.'");</script>';
    }

    public function verify($query){
        global $queryString;
        $result = password_verify($query, $queryString);
        if($result){
            $instance = new userController;
            $input['isVerified']=1;
            $instance->updateUser($_SESSION['email'], $input['isVerified']);
        }else{
            
        }
    }
}