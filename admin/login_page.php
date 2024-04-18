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
    <div class="container" style="height: 360px;">
        <h2 class="h" style="text-align: center;">QuizMaster Admin</h2>
        <h3 class="h" style="text-align: center;">Login</h3>
        <img src="logo/qm.png" alt="" style="height: 120px;margin-left:122px;">
        <form action="login_check_pass.php" method="post">
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn" name="send">Verify</button>
        </form>
    </div>
</body>

</html>