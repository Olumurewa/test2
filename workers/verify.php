<?php
use Test2\controllers as Controllers;

require '../views/verify.view.php';
//require 'caller.php';

    if(isset($_POST['submit']))
    {
        $begin = new Controllers\HashGenerator;
        $begin->hashQuery();
    }