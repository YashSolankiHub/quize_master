<?php
session_start();

// $enrollment = $_SESSION['enrollment'];
// $enrollment='';
// if (isset($_SESSION["enrollment"])) {
//     $enrollment = $_SESSION["enrollment"];
// }

// echo $enrollment;

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
    if (isset($_SESSION['enrollment'])) {
        $enrollment = $_SESSION['enrollment'];
    } else {
        $enrollment = $_POST['enrollment'];
    }
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
        $enrollment = $row['enrollment'];

        break;
    }
}

$select = "SELECT *FROM result WHERE enrollment = '$enrollment'";
$execute = $conn->query($select);
$num = mysqli_num_rows($execute);


// $show_notification = "SELECT *FROM notification";
// $result_notification = $conn->query($show_notification);

// $java = "SELECT *FROM notification WHERE subject = 'java'";
// $result_java = $conn->query($java);
// $num_java = mysqli_num_rows($result_java);
// echo $num_java;





$check_status = "SELECT *FROM exam_status_sem1 WHERE enrollment = '$enrollment'";
$result_check_status = $conn->query($check_status);



// echo "<pre>";
// print_r($row_result_notification);
// echo "</pre>";








?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="10">  auto refres -->
    <title>Home page</title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/home_page.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url("img/online-entrance-exam.png");
        }

        .ctr {
            text-align: center;
        }

        .notification-icon {
            position: relative;
            width: 120px;
            /* Adjust width to your preference */
            height: 38px;
            /* Adjust height to your preference */
            /* background-color: #3498db; */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 13px;
        }

        .notification-icon::after {
            content: attr(data-badge);
            position: absolute;
            top: 0;
            right: 0;
            width: 20px;
            height: 20px;
            background-color: red;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            color: #fff;
            font-weight: bold;
        }

        .w-10 {
            width: 10%;
            margin-bottom: 5px;
        }

        .m5 {
            margin-bottom: 5px;
        }

        .btn_clr {
            background-color: rgb(47, 79, 79);
            border: none;
        }

        .btn_clr:hover {
            background-color: rgb(19, 62, 62);
        }

        .btn-w {
            width: 23em;
        }

        .td {
            background-color: rgb(47, 79, 79);
            color: while;
        }
    </style>
</head>

<body>

    <!-- Modal for notification-->
    <div class="modal fade" id="noti" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Notification</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sem</th>
                                <th scope="col">Subject</th>
                                <th scope="col" style="text-align: center;">Total Question</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            while ($row_check_status = mysqli_fetch_assoc($result_check_status)) {
                                if ($row_check_status["java"] == "0") {
                                    $show_notification = "SELECT *FROM notification WHERE subject = 'java'";
                                    $result_notification = $conn->query($show_notification);
                                    $num_result_notification = mysqli_num_rows($result_notification);
                                    $total = $total + $num_result_notification;
                                    while ($row_result_notification = mysqli_fetch_assoc($result_notification)) { ?>
                                        <tr>
                                            <td><?php echo $row_result_notification['sem']; ?></td>
                                            <td><?php echo $row_result_notification['subject']; ?></td>
                                            <td style="text-align: center;"><?php echo $row_result_notification['total_questions']; ?></td>
                                            <td><?php echo $row_result_notification['date']; ?></td>
                                        </tr>
                                    <?php }
                                }

                                if ($row_check_status["python"] == "0") {
                                    $show_notification = "SELECT *FROM notification WHERE subject = 'python'";
                                    $result_notification = $conn->query($show_notification);
                                    $num_result_notification = mysqli_num_rows($result_notification);
                                    $total = $total + $num_result_notification;
                                    while ($row_result_notification = mysqli_fetch_assoc($result_notification)) { ?>
                                        <tr>
                                            <td><?php echo $row_result_notification['sem']; ?></td>
                                            <td><?php echo $row_result_notification['subject']; ?></td>
                                            <td style="text-align: center;"><?php echo $row_result_notification['total_questions']; ?></td>
                                            <td><?php echo $row_result_notification['date']; ?></td>
                                        </tr>
                                    <?php }
                                }

                                if ($row_check_status["dms"] == "0") {
                                    $show_notification = "SELECT *FROM notification WHERE subject = 'dms'";
                                    $result_notification = $conn->query($show_notification);
                                    $num_result_notification = mysqli_num_rows($result_notification);
                                    $total = $total + $num_result_notification;
                                    while ($row_result_notification = mysqli_fetch_assoc($result_notification)) { ?>
                                        <tr>
                                            <td><?php echo $row_result_notification['sem']; ?></td>
                                            <td><?php echo $row_result_notification['subject']; ?></td>
                                            <td style="text-align: center;"><?php echo $row_result_notification['total_questions']; ?></td>
                                            <td><?php echo $row_result_notification['date']; ?></td>
                                        </tr>
                                    <?php }
                                }

                                if ($row_check_status["dbms"] == "0") {
                                    $show_notification = "SELECT *FROM notification WHERE subject = 'dbms'";
                                    $result_notification = $conn->query($show_notification);
                                    $num_result_notification = mysqli_num_rows($result_notification);
                                    $total = $total + $num_result_notification;
                                    while ($row_result_notification = mysqli_fetch_assoc($result_notification)) { ?>
                                        <tr>
                                            <td><?php echo $row_result_notification['sem']; ?></td>
                                            <td><?php echo $row_result_notification['subject']; ?></td>
                                            <td style="text-align: center;"><?php echo $row_result_notification['total_questions']; ?></td>
                                            <td><?php echo $row_result_notification['date']; ?></td>
                                        </tr>
                                    <?php }
                                }

                                if ($row_check_status["cs"] == "0") {
                                    $show_notification = "SELECT *FROM notification WHERE subject = 'cs'";
                                    $result_notification = $conn->query($show_notification);
                                    $num_result_notification = mysqli_num_rows($result_notification);
                                    $total = $total + $num_result_notification;
                                    while ($row_result_notification = mysqli_fetch_assoc($result_notification)) { ?>
                                        <tr>
                                            <td><?php echo $row_result_notification['sem']; ?></td>
                                            <td><?php echo $row_result_notification['subject']; ?></td>
                                            <td style="text-align: center;"><?php echo $row_result_notification['total_questions']; ?></td>
                                            <td><?php echo $row_result_notification['date']; ?></td>
                                        </tr>
                            <?php }
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer d-flex justify-content-center">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                </div>
            </div>
        </div>
    </div>



    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="margin-top: -8px;">
            <div class="container-fluid color_for_container-fluid">
                <a class="navbar-brand color_for_nav_text" href="#">QuizMaster</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="home_page.php" style="color: white;">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="about.php" style="color: white;">About</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="score.php" style="color: white;">Scoreboard</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">

                        <h6 style="margin-right: 30px; margin-top:6px; color:white"><?php echo $student_name; ?></h6>
                        <div>
                            <a href="#" class="notification-icon btn btn-light" data-badge="<?php echo $total; ?>" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#noti">Notification</a>
                        </div>
                        <div>
                            <img src="img/" alt="">
                        </div>
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="margin-right: 15px;">Profile</button>

                        <button type="button" class="btn btn-light" style="margin-right: 27px;" onclick="home()">Logout</button>
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
    <div class="semester">
        <p class="d-inline-flex gap-1">

            <button class="btn btn-primary btn_clr btn-w" style="margin-left: 24px;" type="button" data-bs-toggle="collapse" data-bs-target="#sem1" aria-expanded="false" aria-controls="collapseExample">
                Semester 1
            </button>
        </p>
        <div class="collapse" id="sem1">
            <div class="card card-body">
                <button class="btn btn-primary w-10 btn_clr" type="button" data-bs-toggle="collapse" data-bs-target="#java" aria-expanded="false" aria-controls="collapseExample">
                    Java
                </button>
                <div class="collapse" id="java">
                    <div class="card card-body m5">
                    <?php
                        $java = "SELECT *FROM result WHERE subject = 'java' ORDER BY percentage DESC";
                        $result_java = $conn->query($java);
                        if (mysqli_num_rows($result_java) > 0) { ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="trh">
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Enrollment</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Student Name</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Title</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Total Questions</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Correct</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Wrong</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Percentage</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    while ($row_java = mysqli_fetch_assoc($result_java)) { ?>
                                        <tr>
                                            <td><?php echo $row_java['enrollment']; ?></td>
                                            <td><?php echo $row_java['student_name']; ?></td>
                                            <td><?php echo $row_java['question_title']; ?></td>
                                            <td><?php echo $row_java['total_question']; ?></td>
                                            <td><?php echo $row_java['correct']; ?></td>
                                            <td><?php echo $row_java['wrong']; ?></td>
                                            <td><?php if ($row_java['percentage'] < 50) {
                                                    echo "Fail";
                                                } else {
                                                    echo $row_java['percentage'] . "%";
                                                } ?></td>
                                            <td><?php echo $row_java['date']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        <?php } else {
                            echo "No result found!";
                        }
                        ?>
                    </div>
                </div>
                <button class="btn btn-primary w-10 btn_clr" type="button" data-bs-toggle="collapse" data-bs-target="#python" aria-expanded="false" aria-controls="collapseExample">
                    Python
                </button>
                <div class="collapse" id="python">
                    <div class="card card-body m5">
                    <?php
                        $java = "SELECT *FROM result WHERE subject = 'python' ORDER BY percentage DESC";
                        $result_java = $conn->query($java);
                        if (mysqli_num_rows($result_java) > 0) { ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="trh">
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Enrollment</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Student Name</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Title</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Total Questions</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Correct</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Wrong</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Percentage</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    while ($row_java = mysqli_fetch_assoc($result_java)) { ?>
                                        <tr>
                                            <td><?php echo $row_java['enrollment']; ?></td>
                                            <td><?php echo $row_java['student_name']; ?></td>
                                            <td><?php echo $row_java['question_title']; ?></td>
                                            <td><?php echo $row_java['total_question']; ?></td>
                                            <td><?php echo $row_java['correct']; ?></td>
                                            <td><?php echo $row_java['wrong']; ?></td>
                                            <td><?php if ($row_java['percentage'] < 50) {
                                                    echo "Fail";
                                                } else {
                                                    echo $row_java['percentage'] . "%";
                                                } ?></td>
                                            <td><?php echo $row_java['date']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        <?php } else {
                            echo "No result found!";
                        }
                        ?>
                    </div>
                </div>
                <button class="btn btn-primary w-10 btn_clr" type="button" data-bs-toggle="collapse" data-bs-target="#dbms" aria-expanded="false" aria-controls="collapseExample">
                    DBMS
                </button>
                <div class="collapse" id="dbms">
                    <div class="card card-body m5">
                    <?php
                        $java = "SELECT *FROM result WHERE subject = 'dbms' ORDER BY percentage DESC";
                        $result_java = $conn->query($java);
                        if (mysqli_num_rows($result_java) > 0) { ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="trh">
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Enrollment</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Student Name</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Title</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Total Questions</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Correct</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Wrong</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Percentage</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    while ($row_java = mysqli_fetch_assoc($result_java)) { ?>
                                        <tr>
                                            <td><?php echo $row_java['enrollment']; ?></td>
                                            <td><?php echo $row_java['student_name']; ?></td>
                                            <td><?php echo $row_java['question_title']; ?></td>
                                            <td><?php echo $row_java['total_question']; ?></td>
                                            <td><?php echo $row_java['correct']; ?></td>
                                            <td><?php echo $row_java['wrong']; ?></td>
                                            <td><?php if ($row_java['percentage'] < 50) {
                                                    echo "Fail";
                                                } else {
                                                    echo $row_java['percentage'] . "%";
                                                } ?></td>
                                            <td><?php echo $row_java['date']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        <?php } else {
                            echo "No result found!";
                        }
                        ?>
                    </div>
                </div>
                <button class="btn btn-primary w-10 btn_clr" type="button" data-bs-toggle="collapse" data-bs-target="#dms" aria-expanded="false" aria-controls="collapseExample">
                    DMS
                </button>
                <div class="collapse" id="dms">
                    <div class="card card-body m5">
                    <?php
                        $java = "SELECT *FROM result WHERE subject = 'dms' ORDER BY percentage DESC";
                        $result_java = $conn->query($java);
                        if (mysqli_num_rows($result_java) > 0) { ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="trh">
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Enrollment</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Student Name</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Title</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Total Questions</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Correct</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Wrong</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Percentage</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    while ($row_java = mysqli_fetch_assoc($result_java)) { ?>
                                        <tr>
                                            <td><?php echo $row_java['enrollment']; ?></td>
                                            <td><?php echo $row_java['student_name']; ?></td>
                                            <td><?php echo $row_java['question_title']; ?></td>
                                            <td><?php echo $row_java['total_question']; ?></td>
                                            <td><?php echo $row_java['correct']; ?></td>
                                            <td><?php echo $row_java['wrong']; ?></td>
                                            <td><?php if ($row_java['percentage'] < 50) {
                                                    echo "Fail";
                                                } else {
                                                    echo $row_java['percentage'] . "%";
                                                } ?></td>
                                            <td><?php echo $row_java['date']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        <?php } else {
                            echo "No result found!";
                        }
                        ?>
                    </div>
                </div>
                <button class="btn btn-primary w-10 btn_clr" type="button" data-bs-toggle="collapse" data-bs-target="#cs" aria-expanded="false" aria-controls="collapseExample">
                    CS
                </button>
                <div class="collapse" id="cs">
                    <div class="card card-body m5">
                        <?php
                        $java = "SELECT *FROM result WHERE subject = 'cs' ORDER BY percentage DESC";
                        $result_java = $conn->query($java);
                        if (mysqli_num_rows($result_java) > 0) { ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="trh">
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Enrollment</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Student Name</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Title</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Total Questions</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Correct</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Wrong</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Percentage</th>
                                        <th scope="col" style="background-color: rgb(47, 79, 79); color:white">Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    while ($row_java = mysqli_fetch_assoc($result_java)) { ?>
                                        <tr>
                                            <td><?php echo $row_java['enrollment']; ?></td>
                                            <td><?php echo $row_java['student_name']; ?></td>
                                            <td><?php echo $row_java['question_title']; ?></td>
                                            <td><?php echo $row_java['total_question']; ?></td>
                                            <td><?php echo $row_java['correct']; ?></td>
                                            <td><?php echo $row_java['wrong']; ?></td>
                                            <td><?php if ($row_java['percentage'] < 50) {
                                                    echo "Fail";
                                                } else {
                                                    echo $row_java['percentage'] . "%";
                                                } ?></td>
                                            <td><?php echo $row_java['date']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        <?php } else {
                            echo "No result found!";
                        }
                        ?>

                    </div>
                </div>



            </div>

        </div>
        <p class="d-inline-flex gap-1">

            <button class="btn btn-primary btn_clr btn-w" type="button" data-bs-toggle="collapse" data-bs-target="#sem2" aria-expanded="false" aria-controls="collapseExample">
                Semester 2
            </button>
        </p>
        <div class="collapse" id="sem2">
            <div class="card card-body">
                Work in progress



            </div>

        </div>
        <p class="d-inline-flex gap-1">

            <button class="btn btn-primary btn_clr btn-w" type="button" data-bs-toggle="collapse" data-bs-target="#sem3" aria-expanded="false" aria-controls="collapseExample">
                Semester 3
            </button>
        </p>
        <div class="collapse" id="sem3">
            <div class="card card-body">
                Work in progress
            </div>
        </div>

        <p class="d-inline-flex gap-1">

            <button class="btn btn-primary btn_clr btn-w" type="button" data-bs-toggle="collapse" data-bs-target="#sem4" aria-expanded="false" aria-controls="collapseExample">
                Semester 4
            </button>
        </p>
        <div class="collapse" id="sem4">
            <div class="card card-body">
                Work in progress
            </div>
        </div>





        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 205%;position:relative;right:245px;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $student_name; ?></h1>
                        <!-- Button trigger modal -->

                        <a href="#" data-bs-toggle="modal" data-bs-target="#static" style="margin-left: 34em;">
                            Change Password
                        </a>



                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p><b>Enrollment: <?php echo $enrollment; ?></b></p>
                        <table class="table">

                            <?php
                            if ($num >= 1) { ?>
                                <thead>
                                    <tr>

                                        <th scope="col" class="ctr">Given exam</th>
                                        <th scope="col" class="ctr">Title</th>
                                        <th scope="col" class="ctr">Semester</th>
                                        <th scope="col" class="ctr">Total Questions</th>
                                        <th scope="col" class="ctr">Correct</th>
                                        <th scope="col" class="ctr">Wrong</th>
                                        <th scope="col" class="ctr">Percentage</th>
                                        <th scope="col" class="ctr">Result</th>
                                        <th scope="col" class="ctr">Date</th>
                                        <th scope="col" class="ctr">Certificate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($line = mysqli_fetch_assoc($execute)) { ?>
                                        <tr>
                                            <td class="ctr"><?php echo $line['subject']; ?></td>
                                            <td class="ctr"><?php echo $line['question_title']; ?></td>
                                            <td class="ctr"><?php echo $line['semester']; ?></td>
                                            <td class="ctr"><?php echo $line['total_question']; ?></td>
                                            <td class="ctr"><?php echo $line['correct']; ?></td>
                                            <td class="ctr"><?php echo $line['wrong']; ?></td>
                                            <td class="ctr"><?php echo $line['percentage'] . "%"; ?></td>
                                            <td class="ctr"><?php echo $line['result_status']; ?></td>
                                            <td class="ctr"><?php echo $line['date']; ?></td>
                                            <?php
                                            if ($line['subject'] == 'java') {
                                                $subject_code = "23MCA101";
                                            } elseif ($line['subject'] == 'python') {
                                                $subject_code = "23MCA102";
                                            } elseif ($line['subject'] == 'dbms') {
                                                $subject_code = "23MCA103";
                                            } elseif ($line['subject'] == 'dms') {
                                                $subject_code = "23MCA104";
                                            } elseif ($line['subject'] == 'cs') {
                                                $subject_code = "23MCA105";
                                            }

                                            $certificate_url = "certificates/" . $enrollment . "_" . $subject_code . ".jpg";

                                            ?>
                                            <?php
                                            if ($line['percentage'] >= 80) { ?>
                                                <td class="ctr"><button class="btn btn-warning" download="" style="width: 90px;
                                            height: 25px;padding: 0;color: white;background-color:rgb(47, 79, 79);border:none;">
                                                        <a href="<?php echo $certificate_url; ?>" style="color:white;text-decoration:none;" download="">Download</a>
                                                    </button></td>


                                            <?php } else { ?>
                                                <td class="ctr d-flex" style="flex-direction:column;"><button class="btn btn-warning" download="" style="width: 90px;
                                            height: 25px;padding: 0;color: white;background-color:rgb(47, 79, 79);border:none;" disabled>
                                                        <a href="#" style="color:white;text-decoration:none;">Download</a>
                                                    </button><a target="_blank" href="about.php" style="margin-right: 5px;font-size:10px;">Learn more</a></td>
                                            <?php } ?>

                                        </tr>
                                    <?php }
                                } else { ?>
                                    <p style="text-align: center;">No results found!</p>
                                <?php  } ?>
                                </tbody>
                        </table>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="static" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="change_password_validation.php" method="post">
                            <label for="cp" class="form-label">Current Password:</label>
                            <input type="password" name="current_password" class="form-control" id="cp" required>
                            <br>
                            <label for="cp" class="form-label">New Password:</label>
                            <input type="password" name="new_password" class="form-control" id="cp" required>
                            <input type="hidden" name="enrollment" value="<?php echo $enrollment; ?>">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Change</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>