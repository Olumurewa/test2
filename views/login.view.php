<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>
<body>
    <div>
        <nav>
            <ul>
                <li><a href='#'>LOGIN</a></li>

                <li class='list-item'><a href='register.php'>REGISTER</a></li>

            </ul>
        </nav>

    </div>
    <?php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL); 
    ?>

    <div>

    <form class='elevate' action='../workers/login.php' method='post'>
        <h1>LOGIN</h1>
        <input required='required' type='email' name='email' placeholder='Email'><br/>
        <input  type='password' name='password' placeholder='Password'><br/>
        <button name='submit' type='submit'>login</button><br/>
        <button name='otp' type='submit'>OTP login</button><br/>
        <a href="">Forgot Password?</a>
        <a href="../workers/otpLogin.php"> OTP Login</a>
    </form>
    

    </div>
    <style>
        nav{
            display: flex;
            flex-direction: row;
            text-decoration: none;
            background-color: pink;
            justify-content: space-evenly;
        }
        li{
            display: inline;
            list-style: none;
            text-decoration: none;
            color: white;
        }
        .list-item{
            padding-left: 3rem;
        }
        a{
            color:black;
            text-decoration: none !important; 
        }
        a:hover{
            color: aliceblue;
            text-decoration: wavy;
        }
        .elevate {
            background: #ffffff;
            box-shadow: 0px 0px 20px -3px rgba(0, 0, 0, 0.12);
            padding: 7%;
        }


    </style>
</body>

</html>