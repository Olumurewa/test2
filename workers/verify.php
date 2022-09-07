<?php
use test2\controllers as controllers;

require '../views/verify.view.php';


    if(isset($_POST['submit'])){
        $begin = new controllers\hashGenerator;
        $begin->hashQuery();
    }