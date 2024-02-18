<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>404 Error - Page Not Found</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }
    .container {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .error-message {
        color: darkslategray;
        font-size: 3rem;
        margin-bottom: 20px;
    }
    .error-description {
        color: darkslategray;
        font-size: 1.2rem;
        margin-bottom: 20px;
    }
    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: darkslategray;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .button:hover {
        background-color: #333;
    }
</style>
</head>
<body>
<div class="container">
    <div>
        <h1 class="error-message">404</h1>
        <p class="error-description">Sorry, the page you are looking for could not be found.</p>
        <a href="login_page.php" class="button">Go to Login Page</a>
    </div>
</div>
</body>
</html>
