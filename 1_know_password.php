

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Know Your Password</title>
<link rel="icon" href="logo/qm.png" type="image/x-icon">
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }
    .container {
        width: 370px;
        margin: 100px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        height: 310px;
    }

    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        font-weight: bold;
        color: darkslategray;
    }
    .form-group input {
        width: 100%;
        padding: 5px 0;
        border: none;
        border-bottom: 1px solid rgb(168, 168, 168);
        outline: none;
        font-size: 17px;
    }
    .btn {
        width: 100%;
        padding: 12px;
        background-color: darkslategray;
        border: none;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        margin-top: 5px;
        font-size: 20px;

    }
    .btn:hover {
        background-color: #333;
    }
    .h{
        text-align: left;
        color: darkslategray;
    }
    .logo_with_name{
        display: flex;
    }
    .back_to_login_page_a{
        color: rgb(0, 103, 184);
        text-decoration: none;
    }
    .back_to_login_page_a:hover{
        text-decoration: underline;
    }
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
            <input  type="number" id="enrollment" name="enrollment" placeholder="Enrollment number" min="2304070100001" max="2304070100187" required>
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
