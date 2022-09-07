<?php

session_start();
require '../controllers/authController.php';
require '../controllers/userController.php';
require '../controllers/otpController.php';
require '../controllers/hashGenerator.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
