

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
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
        height: 320px;
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
        margin-top: 15px;
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
</style>
</head>
<body background="img/Blur Bg.png">
<div class="container">
    <div class="logo_with_name">
        <span><img src="logo/qm.png" alt="" style="height: 70px;"></span><h2 class="h">QuizMaster</h2>
    </div>
    
    <h3 class="h">Login</h3>
    <form action="login_page_validation.php" method="post">
        <div class="form-group">
            <input  type="number" id="enrollment" name="enrollment" placeholder="Enrollment number" min="2304070100001" max="2304070100187" required>
        </div>
        <div class="form-group">

            <input style="margin-top: 5px;" type="password" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
</div>
</body>
</html>
