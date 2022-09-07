<?php
namespace Test2\controllers;

use test2\database as data;
class HashGenerator{
    private $SecretKey = "Ringsaroundtheroses";

    public function hashQuery(){
        $queryString = $this->SecretKey.' '.rand(1000, 9999);
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = $this->SecretKey;
        $encryption = openssl_encrypt($queryString, $ciphering,
            $encryption_key, $options, $encryption_iv);
        //$hashstring = password_hash($queryString, PASSWORD_BCRYPT);
        $uri = 'localhost/test2?hash='.$encryption;
        echo '<script type="text/javascript">alert("'.$uri.'");</script>';
    }

    public function decryptHash(){
        $url = parse_url($_SERVER['REQUEST_URI']);
        if (isset($url['query'])){
            $sep = explode('=', $url['query']);
            $ciphering = "AES-128-CTR";
            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;
            $decryption_iv = '1234567891011121';
            $decryption_key = $this->SecretKey;
            $decryption=openssl_decrypt ($sep[1], $ciphering, 
            $decryption_key, $options, $decryption_iv);


            if(strlen($decryption) == 24){
                $piece = explode(' ', $decryption);
                if ($piece[0] === $this->SecretKey){
                    echo '<script>alert("Redirecting")</script>';
                    echo '<script>window.location.replace("./workers/emailVerify.php");</script>';
                }
            }
        }
    }

   
}