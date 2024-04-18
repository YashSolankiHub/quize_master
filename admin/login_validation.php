<?php
session_start();
include "db_connection.php";
$otp = $_POST['otp'];

$sql = "SELECT *FROM admin_login WHERE otp='$otp'";
$result = $conn->query($sql);
$num = mysqli_num_rows($result);



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
                
                <?php 
                if(!($num))
                    { ?>
                        <p style="margin-top: 1px;color:red"> *Invalid OTP </p>
                    <?php }
                else
                    {
                        $_SESSION['otp'] = $otp;
                        echo "<script>
                                window.location.href = 'home_page.php';
                          </script> ";
                    }
                
                ?>
            </div>
            
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
    
</body>

</html>