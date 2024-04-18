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
    <!-- <meta http-equiv="refresh" content="3">  auto refres -->
    <title>About page</title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/home_page.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
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
                                            <td>
                                                <?php echo $row_result_notification['sem']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_result_notification['subject']; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo $row_result_notification['total_questions']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_result_notification['date']; ?>
                                            </td>
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
                                            <td>
                                                <?php echo $row_result_notification['sem']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_result_notification['subject']; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo $row_result_notification['total_questions']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row_result_notification['date']; ?>
                                            </td>
                                        </tr>
                            <?php }
                                }

                                if($row_check_status["dms"] == "0")
                                {
                                    $show_notification = "SELECT *FROM notification WHERE subject = 'dms'";
                                    $result_notification = $conn->query($show_notification);
                                    $num_result_notification = mysqli_num_rows($result_notification);
                                    $total = $total + $num_result_notification;
                                    while($row_result_notification= mysqli_fetch_assoc($result_notification))
                                    { ?>
                                        <tr>
                                            <td><?php echo $row_result_notification['sem']; ?></td>
                                            <td><?php echo $row_result_notification['subject']; ?></td>
                                            <td style="text-align: center;"><?php echo $row_result_notification['total_questions']; ?></td>
                                            <td><?php echo $row_result_notification['date']; ?></td>
                                        </tr>
                                   <?php }
                                }

                                if($row_check_status["dbms"] == "0")
                                {
                                    $show_notification = "SELECT *FROM notification WHERE subject = 'dbms'";
                                    $result_notification = $conn->query($show_notification);
                                    $num_result_notification = mysqli_num_rows($result_notification);
                                    $total = $total + $num_result_notification;
                                    while($row_result_notification= mysqli_fetch_assoc($result_notification))
                                    { ?>
                                        <tr>
                                            <td><?php echo $row_result_notification['sem']; ?></td>
                                            <td><?php echo $row_result_notification['subject']; ?></td>
                                            <td style="text-align: center;"><?php echo $row_result_notification['total_questions']; ?></td>
                                            <td><?php echo $row_result_notification['date']; ?></td>
                                        </tr>
                                   <?php }
                                }

                                if($row_check_status["cs"] == "0")
                                {
                                    $show_notification = "SELECT *FROM notification WHERE subject = 'cs'";
                                    $result_notification = $conn->query($show_notification);
                                    $num_result_notification = mysqli_num_rows($result_notification);
                                    $total = $total + $num_result_notification;
                                    while($row_result_notification= mysqli_fetch_assoc($result_notification))
                                    { ?>
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
                        <li class="nav-item " style="border:1px solid white;border-radius:15px">
                            <a class="nav-link active " aria-current="page" href="about.php" style="color: white;">About</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">

                        <h6 style="margin-right: 30px; margin-top:6px; color:white">
                            <?php echo $student_name; ?>
                        </h6>
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

        <div class="col">
            <div class="card for_card for_left_side_card">

                <div class="card-body">
                    <h5><b> QuizeMaster</b></h5>
                    <p style="text-align: justify;">The development of an Online MCQs Examination System marks a
                        significant project endeavor, poised to revolutionize the assessment process for students
                        pursuing a Master of Computer Applications (MCA) degree. This system aims to streamline and
                        modernize the evaluation methodology by aggregating a comprehensive repository of
                        multiple-choice questions (MCQs) meticulously curated from the entire academic curriculum
                        spanning four semesters. The primary objective of this initiative is to provide a robust
                        platform where MCA students can engage in structured self-assessment and examination
                        preparation. By organizing questions across all four semesters, the system ensures comprehensive
                        coverage of the curriculum, offering students a holistic understanding of the subject matter and
                        facilitating a systematic review of their knowledge and skills. Through the seamless integration
                        of technology, students can access the platform remotely, enabling flexibility and convenience
                        in their learning journey. Furthermore, the system's user-friendly interface and intuitive
                        design prioritize ease of navigation, ensuring an optimal user experience for both students and
                        educators alike. By leveraging the power of digital innovation, the Online MCQs Examination
                        System not only enhances the efficiency and effectiveness of the evaluation process but also
                        empowers MCA students to excel academically and thrive in their educational pursuits

                        Upon completion of an examination within the Online MCQs Examination System, students are
                        presented with the invaluable opportunity to receive instantaneous feedback on their
                        performance. Leveraging advanced algorithms and real-time data processing, the system swiftly
                        computes and generates individualized results, providing students with a comprehensive overview
                        of their strengths and areas for improvement. This prompt feedback mechanism not only fosters a
                        culture of continuous learning but also empowers students to gauge their progress accurately and
                        make informed decisions regarding their academic endeavors. Moreover, the system offers a
                        dynamic feature wherein students can access a comprehensive ranking chart showcasing the
                        performance of their peers who undertook the same examination. This ranking chart, meticulously
                        compiled and updated in real-time, offers invaluable insights into the relative standing of each
                        student within the cohort. By visualizing the distribution of marks among their peers, students
                        gain valuable perspective on their academic standing, fostering healthy competition and driving
                        motivation for further improvement. Furthermore, the ranking chart serves as a catalyst for
                        collaboration and peer learning, encouraging students to engage in constructive dialogue and
                        knowledge sharing to collectively elevate their academic prowess. Through the seamless
                        integration of instant result generation and a comprehensive ranking chart, the Online MCQs
                        Examination System not only revolutionizes the assessment process but also nurtures a culture of
                        excellence and collaboration within the academic community.
                    <h6><b> Certificate</b></h6>
                    <p>In the Online MCQs Examination System, students who achieve scores exceeding 80% in any subject are awarded specialized certificates corresponding to that subject. These certificates serve as tangible recognition of their academic proficiency and dedication. Endorsed by the institution and bearing the subject's relevance, they not only validate students' achievements but also enhance their academic credentials. This incentivizes excellence, fostering a culture of achievement and motivating students to excel in their studies</p>
                    </p>
                </div>
            </div>
        </div>

    </div>




    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 205%;position:relative;right:245px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                        <?php echo $student_name; ?>
                    </h1>
                    <!-- Button trigger modal -->

                    <a href="#" data-bs-toggle="modal" data-bs-target="#static" style="margin-left: 34em;">
                        Change Password
                    </a>



                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p><b>Enrollment:
                            <?php echo $enrollment; ?>
                        </b></p>
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
                                        <td class="ctr">
                                            <?php echo $line['subject']; ?>
                                        </td>
                                        <td class="ctr">
                                            <?php echo $line['question_title']; ?>
                                        </td>
                                        <td class="ctr">
                                            <?php echo $line['semester']; ?>
                                        </td>
                                        <td class="ctr">
                                            <?php echo $line['total_question']; ?>
                                        </td>
                                        <td class="ctr">
                                            <?php echo $line['correct']; ?>
                                        </td>
                                        <td class="ctr">
                                            <?php echo $line['wrong']; ?>
                                        </td>
                                        <td class="ctr">
                                            <?php echo $line['percentage'] . "%"; ?>
                                        </td>
                                        <td class="ctr">
                                            <?php echo $line['result_status']; ?>
                                        </td>
                                        <td class="ctr">
                                            <?php echo $line['date']; ?>
                                        </td>
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
                                                </button><a href="#" style="margin-right: 5px;font-size:10px;">Learn more</a></td>
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