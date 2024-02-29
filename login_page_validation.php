<?php
session_start();


include "limit_enrollment_for_login.php";

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



function customErrorHandler($errno, $errstr, $errfile, $errline)
{
    // Check if the error level is among those you want to convert into exceptions
    if (error_reporting() === 0 || !in_array($errno, [E_WARNING, E_NOTICE])) {
        return;
    }

    // Throw an exception
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}

// Set custom error handler
set_error_handler('customErrorHandler');

try {
    // Trigger a PHP warning
    $enrollment = $_POST['enrollment'];
    $password = $_POST['password'];
} catch (ErrorException $e) {
    // Catch the exception
    echo "<script>
    window.location.href ='404_error.php';
        </script>";
}

$s = "SELECT *FROM enrollment WHERE enrollment = '$enrollment'";
$r = mysqli_query($conn, $s);
$n= mysqli_num_rows($r);


$md_pass = md5($password);
$sql = "SELECT *FROM enrollment WHERE enrollment = '$enrollment' AND password = '$md_pass'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link rel="stylesheet" href="style/login_page_validation.css">
    <style>
        
    </style>
</head>

<body background="img/Blur Bg.png">
    <div class="container">
        <div class="logo_with_name">
            <span><img src="logo/qm.png" alt="" style="height: 70px;"></span>
            <h2 class="h">QuizMaster</h2>
        </div>

        <h3 class="h">Login</h3>
        <form action="login_page_validation.php" method="post">
            <div class="form-group">
                <input type="number" id="enrollment" name="enrollment" value="<?php echo $enrollment; ?>" placeholder="Enrollment number" min="<?php echo $min;?>" max="<?php echo $max;?>" required>
            </div>
            <div class="form-group">

                <input style="margin-top: 5px;" type="password" id="password" value="<?php echo $password; ?>"  name="password" placeholder="Password" required>
                <?php
                if(!$n) {
                    ?>
                    <p style="color:red"> <?php echo "*Enrollment not available" ?></p>
                    <p style="color: orange;">Know your password <a href="1_know_password.php" class="click_here_a">click here</a></p>
                
                    <?php  
                } elseif (!$num) { 
                    ?>
                    <p style="color:red"> <?php echo "*Incorrect password!" ?></p>
                    <p style="color: orange;">Know your password <a href="1_know_password.php" class="click_here_a">click here</a></p>
                    <?php 
                } else {
                   $_SESSION['enrollment'] = $enrollment;
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