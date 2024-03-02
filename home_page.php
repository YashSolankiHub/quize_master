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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/home_page.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .ctr {
            text-align: center;
        }
    </style>
</head>

<body>

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

                    </ul>
                    <form class="d-flex" role="search">
                        <h6 style="margin-right: 60px; margin-top:6px; color:white"><?php echo $student_name; ?></h6>
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


        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card for_card for_left_side_card">

                    <div class="card-body">
                        <h2 class="card-title center_all_semester_head">Semester 1</h2>
                        <div class="container">
                            <h5>Select Subject</h5>
                            <form action="modal_exam_sure.php" method="post">
                                <select id="subjectSelect" class="form-select" name="subject" onchange="this.form.submit()">
                                    <option value="0">--select--</option>
                                    <option value="java">Core Java</option>
                                    <option value="python">Python Programming</option>
                                    <option value="dbms">Database Management System</option>
                                    <option value="dms">Descrete Mathematics Structure</option>
                                    <option value="cs">Communication Skills</option>
                                </select>
                                <input type="hidden" name="sem" value="1">
                                <input type="hidden" name="student_name" value="<?php echo $student_name; ?>">
                                <input type="hidden" name="enrollment" value="<?php echo $enrollment; ?>">
                            </form>
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
                            <h5>Select Subject</h5>
                            <select id="subjectSelect" class="form-select">
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
                            <h5>Select Subject</h5>
                            <select id="subjectSelect" class="form-select">
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
                            <h5>Select Subject</h5>
                            <select id="subjectSelect" class="form-select">
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

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 120%;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $student_name; ?></h1>

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
                                    <th scope="col" class="ctr">Semester</th>
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
                                        <td class="ctr"><?php echo $line['semester']; ?></td>
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
                                            <td class="ctr"><button class="btn btn-warning" download="" style="width: 90px;
                                            height: 25px;padding: 0;color: white;background-color:rgb(47, 79, 79);border:none;" disabled>
                                                    <a href="#" style="color:white;text-decoration:none;">Download</a>
                                                </button></td>
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
</body>

</html>