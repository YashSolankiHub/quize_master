<?php
include "db_connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$characters = "xyzabcklopshjh965412378";
$password = '';
$length = 8;
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
// echo $password;

$sql  = "UPDATE admin_login set otp = '$password'";
$conn->query($sql);


    



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link rel="stylesheet" href="style/login_page.css">
    <style>
        
    </style>
</head>

<body background="img/Blur Bg.png">
<div class="container" style="height: 255px;">
        <div class="logo_with_name">
            <span><img src="logo/qm.png" alt="" style="height: 70px;"></span>
            <h2 class="h">QuizMaster Admin</h2>
        </div>

        <h3 class="h">Login</h3>
        <form action="login_validation.php" method="post">
            <div class="form-group">
                <input type="password" id="otp" name="otp" placeholder="OTP" required>
            </div>
            
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>

</html>