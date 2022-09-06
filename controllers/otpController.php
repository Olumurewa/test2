<?php
require '../database/dbFunctions.php';


class OtpController{

    public function otpGenerator($userID){
        $otp = rand(100000, 999999);
        $func = new dbFunctions;
        if($func->storeOtp($otp,$userID)){
            echo '<script type="text/javascript">alert("COPY: '.$otp.'");</script>';
        }
    }

    public function confirmOtp($otp){
        $func = new dbFunctions;
        if($func->findOtp($otp) && $func->findOtp->stmt['isExpired']==0){
            $func->verifyOtp($otp);
            echo '<script>alert("Success!")</script>';
            echo '<script>window.location.replace("../dashboard.php")</script>';
        }else{
            echo '<script>alert("Error!")</script>';
            echo '<script>window.location.replace("../workers/login.php")</script>';
        }
    }
}