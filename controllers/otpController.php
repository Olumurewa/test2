<?php
require_once '../database/dbFunctions.php';


class OtpController{

    /**
     * function to generate new OTP
     * 
     * @param int $userID
     */
    public function otpGenerator($userID){

        $otp = rand(100000, 999999);
        $func = new dbFunctions;
        $func->storeOtp($otp,$userID);
        echo '<script type="text/javascript">alert("COPY: '.$otp.'");</script>';
        

    }


    /**
     * function to validate OTP
     * 
     * @param int $otp
     */
    public function confirmOtp($otp){
        $func = new dbFunctions;
        $func->findOtp($otp);
        var_dump($_SESSION);
        $value = $_SESSION['otp'];
        if($value == 0){ // Checks if OTP exists and is still valid

            $user = $_SESSION['userID'];
            $attempt = $_SESSION['otpUID'];


            if($user == $attempt){ //checks if OTP belongs to user who is attempting to use it
                $func->verifyOtp($otp);
                echo '<script>alert("Success!")</script>';
                echo '<script>window.location.replace("../workers/dashboard.php")</script>';
            }else{
                echo '<script>alert("Error! invalid OTP")</script>';
                echo '<script>window.location.replace("../workers/login.php")</script>';
            }
            
        }else{
            echo '<script>alert("Error! expired")</script>';
            echo '<script>window.location.replace("../workers/login.php")</script>';
        }
    }
}