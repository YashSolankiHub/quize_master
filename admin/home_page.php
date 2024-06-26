<?php
session_start();
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
    if (isset($_SESSION['otp'])) {
        $otp = $_SESSION['otp'];
    }else
        {
            $otp = $_POST['otp'];
        }
} catch (ErrorException $e) {
    // Catch the exception
    echo "<script>
    window.location.href ='404_error.php';
        </script>";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Home page</title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/home_page.css">
    <style>
        body{
            background-image: url("img/online-entrance-exam.png");
        }
        .li-hover:hover{
            background-color: rgb(247, 247, 247);
            color: black;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary"  style="margin-top: -8px;">
            <div class="container-fluid color_for_container-fluid">

                <a class="navbar-brand color_for_nav_text" href="#">QuizMaster</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="home_page.php" style="color: white;">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="show_students.php" style="color: white;">Students</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="all_sem_select_subject.php" style="color: white;">Add Questions</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="show_question_all_sem.php" style="color: white;">Show Current Questions</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="sem/show_past_questions.php" style="color: white;">Show Past questions</a>
                        </li>
                        

                    </ul>
                    <form class="d-flex" role="search">
                        <button type="button" class="btn btn-light"  onclick="home()" style="margin-right: 26px;">Logout</button>
                    </form>
                    <script>
                        function home() {
                           
                            window.location.href = "destroy_login_session.php";
                         
                        }
                    </script>
                </div>
            </div>
        </nav>
    </header>
    

</body>

</html>