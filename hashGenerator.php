<?php
include 'controllers/userController.php';

class hashGenerator{
    private $SecretKey = "Rings around the roses";

    public function hashQuery(){
        $queryString = $this->SecretKey.rand(1000, 9999);
        $hashstring = password_hash($queryString, PASSWORD_BCRYPT);
        $uri = 'localhost/test2?hash='.$hashstring;
        echo '<script type="text/javascript">alert("'.$uri.'");</script>';
    }

   
}