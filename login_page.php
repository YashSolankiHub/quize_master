<?php  
    include "limit_enrollment_for_login.php";

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
    <div class="container">
        <div class="logo_with_name">
            <span><img src="logo/qm.png" alt="" style="height: 70px;"></span>
            <h2 class="h">QuizMaster</h2>
        </div>

        <h3 class="h">Login</h3>
        <form action="login_page_validation.php" method="post">
            <div class="form-group">
                <input type="number" id="enrollment" name="enrollment" placeholder="Enrollment number" min="<?php echo $min; ?>" max="<?php echo $max; ?>" required>
            </div>
            <div class="form-group">

                <input style="margin-top: 5px;" type="password" id="password" name="password" placeholder="Password" required>
                <p style="color: orange;">Know your password <a href="1_know_password.php" class="click_here_a">click here</a></p>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>

</html>