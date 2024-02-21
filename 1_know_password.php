<?php 
    include "limit_enrollment_for_login.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Know Your Password</title>
<link rel="icon" href="logo/qm.png" type="image/x-icon">
<link rel="stylesheet" href="style/1_know_password.css">
<style>
    
</style>
</head>
<body background="img/Blur Bg.png">
<div class="container">
    <div class="logo_with_name">
        <span><img src="logo/qm.png" alt="" style="height: 70px;"></span><h2 class="h">QuizMaster</h2>
    </div>
    
    <h3 class="h">Know Your Password</h3>
    <form action="1_password_process.php" method="post">
        <div class="form-group">
            <input  type="number" id="enrollment" name="enrollment" placeholder="Enrollment number" min="<?php echo $min;?>" max="<?php echo $max;?>" required>
        </div>
        <div class="form-group">
            <p style="font-size: 13px;">Password will be sent to your register mail</p>
            <p><a href="login_page.php" class="back_to_login_page_a">Back to login page</a></p>
        </div>
        <button type="submit" class="btn" name="send">Get Mail</button>
    </form>
</div>
</body>
</html>
