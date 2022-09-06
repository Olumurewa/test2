<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../hashGenerator.php';
require '../views/verify.view.php';


    if(isset($_POST['submit'])){
        $begin = new hashGenerator;
        $begin->hashQuery();
    }