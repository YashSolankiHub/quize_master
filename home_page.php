
<?php
    session_start();
    function customErrorHandler($errno, $errstr, $errfile, $errline) {
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
        $enrollment = $_SESSION['enrollment'];
    } catch (ErrorException $e) {
        // Catch the exception
        echo "<script>
        window.location.href ='404_error.php';
            </script>";
    }


    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "quize_master";

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 

    $sql = "select *from enrollment";
    $result = mysqli_query($conn, $sql);

    $student_name = "";
    while ($row = mysqli_fetch_assoc($result)) {
        if ($enrollment == $row['enrollment']) {
            $student_name = $row['student_name'];

            break;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            /* display: flex;
            justify-content: center; */
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 50%;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 20px;
            appearance: none;
            /* Remove default arrow */
            background-color: #f2f2f2;
            cursor: pointer;
        }

        select:focus {
            outline: none;
            border-color: #4caf50;
        }

        select option {
            background-color: #f2f2f2;
            color: #333;
        }

        select option:hover {
            background-color: #e0e0e0;
        }

        #selectedSubject {
            margin-top: 20px;
            font-weight: bold;
        }

        .center_all_semester_head {
            text-align: center;
        }

        .color_for_container-fluid {
            background-color: darkslategray;
            height: 60px;
        }

        .color_for_nav_text {
            color: white;
        }

        .for_card {
            width: 80%;
        }

        .for_left_side_card {
            margin-left: 135px;
        }

        .semester {
            margin-top: 30px;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow-x: hidden;
            /* Hide horizontal scrollbar */
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 50%;
            text-align: center;
        }

        /* Remove margin from the right and bottom of the .semester div */
        .semester {
            margin-right: 0;
            margin-bottom: 0;
            padding-right: 0;
            padding-bottom: 0;
        }

        /* Adjust padding and margin for the cards */
        .for_card {
            width: 90%;
            /* Adjusted width for better fit */
            margin: 0 auto;
            /* Centering the cards */
        }

        /* Adjust margin for the left side cards */
        .for_left_side_card {
            margin-left: 37.2px;
        }
        .navbar-brand:hover{
            color:  white;
        }

    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="margin-top: -8px;">
            <div class="container-fluid color_for_container-fluid">
                <a class="navbar-brand color_for_nav_text" href="#">QuizMaster</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="#" style="color: white;">Home</a>
                        </li>
                        


                    </ul>
                    <form class="d-flex" role="search">
                        <h6 style="margin-right: 60px; margin-top:6px; color:white"><?php echo $student_name; ?></h6>
                        <button type="button" class="btn btn-light" style="margin-right: 15px;">Profile</button>
                        <button type="button" class="btn btn-light" style="margin-right: 27px;" onclick="home()">Logout</button>
                    </form>
                    <script>
                        function home(){
                            <?php  session_destroy();?>
                            window.location.href="login_page.php";
                        }
                    </script>
                </div>
            </div>
        </nav>
    </header>
    <div class="semester">


        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card for_card for_left_side_card">

                    <div class="card-body">
                        <h2 class="card-title center_all_semester_head">Semester 1</h2>
                        <div class="container">
                            <h5>Select a Subject</h5>
                            <select id="subjectSelect">
                                <option value="">--select--</option>
                                <option value="PHP">PHP</option>
                                <option value="CN">CN</option>
                                <option value="HTML">HTML</option>
                                <option value="CS">CS</option>
                            </select>
                            <div id="selectedSubject"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card for_card ">

                    <div class="card-body">
                        <h2 class="card-title center_all_semester_head">Semester 2</h2>
                        <div class="container">
                            <h5>Select a Subject</h5>
                            <select id="subjectSelect">
                                <option value="">--select--</option>
                                <option value="PHP">PHP</option>
                                <option value="CN">CN</option>
                                <option value="HTML">HTML</option>
                                <option value="CS">CS</option>
                            </select>
                            <div id="selectedSubject"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card for_card for_left_side_card">

                    <div class="card-body">
                        <h2 class="card-title center_all_semester_head">Semester 3</h2>
                        <div class="container">
                            <h5>Select a Subject</h5>
                            <select id="subjectSelect">
                                <option value="">--select--</option>
                                <option value="PHP">PHP</option>
                                <option value="CN">CN</option>
                                <option value="HTML">HTML</option>
                                <option value="CS">CS</option>
                            </select>
                            <div id="selectedSubject"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card for_card">

                    <div class="card-body">
                        <h2 class="card-title center_all_semester_head">Semester 4</h2>
                        <div class="container">
                            <h5>Select a Subject</h5>
                            <select id="subjectSelect">
                                <option value="">--select--</option>
                                <option value="PHP">PHP</option>
                                <option value="CN">CN</option>
                                <option value="HTML">HTML</option>
                                <option value="CS">CS</option>
                            </select>
                            <div id="selectedSubject"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>