<?php
require 'callable.php';

require '../views/verify.view.php';


    if(isset($_POST['submit'])){
        $begin = new hashGenerator;
        $begin->hashQuery();
    }