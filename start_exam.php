<?php
include "db_connection.php";
$sem = $_POST['sem'];
$subject = $_POST['subject'];
$student_name = $_POST['student_name'];
$enrollment = $_POST['enrollment'];
$exam_id = $_POST['exam_id'];

if ($subject == 'java') {
    $subject_fullname = "Core Java";
} elseif ($subject == 'python') {
    $subject_fullname = "Python Programming";
} elseif ($subject == 'dbms') {
    $subject_fullname = "Database Management System";
} elseif ($subject == 'dms') {
    $subject_fullname = "Descrete Mathematics Structure";
} elseif ($subject == 'cs') {
    $subject_fullname = "Communication Skills";
}



// echo $sem;
// echo "<br>";
// echo $subject;
// echo "<br>";
// echo $student_name;
// echo "<br>";
// echo $enrollment;


$select = "SELECT *FROM questions WHERE semester = $sem AND subject = '$subject'";
$result = $conn->query($select);
$num = mysqli_num_rows($result);

$s = "SELECT time_minutes FROM questions WHERE semester = $sem AND subject = '$subject'";
$r = $conn->query($s);
$line = mysqli_fetch_assoc($r);

$time = $line['time_minutes'];
// echo $time;






$time


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam:<?php echo " " . $subject_fullname;  ?></title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/home_page.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <style>
        .container {
            max-width: 120%;
            width: 95%;
            text-align: left;
        }

        .for_card {
            margin-left: 21.8em;
            width: 110%;
        }

        .option {
            color: black;
            border: 1px solid black;
            width: 60%;
            text-align: left;
        }

        .option:hover {
            background-color: darkslategray;
            color: white;


        }
    </style>

</head>

<body>
    <div class="d-flex justify-content-center">
        <p style="color:red;margin-top:20px;font-size:18px;">Note : Do not close/change tab or minimize the browser during exam <br> Your exam will close automatically after the time is over.<br> You have to submit the exam within the given time. <br> That is why you have to submit the exam within the given time.</p>
    </div>


    <div class="semester" style="margin-top:0px;">


        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card for_card for_left_side_card">
                    <h2 class="card-title center_all_semester_head"> Semester <?php echo $sem . ":" . $subject_fullname; ?></h2>
                    <div class="d-flex justify-content-center">
                        <h4>Remainning Time: <span id="countdown" style="color: red;"><?php echo $time; ?></span> minutes </h4>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="question">

                            <div class="d-flex justify-content-end" style="margin-right: 20px;">

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Quit test
                                </button>


                            </div>
                            <form action="check_answer.php" method="post" target="_blank">
                                <?php $qn = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>

                                    <div class="container" style="margin-bottom: 20px;">
                                        <div class="question" style="margin-bottom: 20px;">
                                            <h5 style="text-align: left;"> Q<?php echo $qn . ": " . $row['question'] ?>
                                            </h5>
                                            <input type="radio" value="option1" class="btn-check" name="option-for-<?php echo $qn; ?>" id="<?php echo $qn . "1"; ?>" autocomplete="off" required>
                                            <label class="btn btn-outline-secondary option" for="<?php echo $qn . "1"; ?>" style="margin-top: 10px;"><?php echo $row['option1']; ?></label>
                                            <br>
                                            <input type="radio" value="option2" class="btn-check" name="option-for-<?php echo $qn; ?>" id="<?php echo $qn . "2"; ?>" autocomplete="off" required>
                                            <label class="btn btn-outline-secondary option" for="<?php echo $qn . "2"; ?>" style="margin-top: 10px;"><?php echo $row['option2']; ?></label>
                                            <br>
                                            <input type="radio" value="option3" class="btn-check" name="option-for-<?php echo $qn; ?>" id="<?php echo $qn . "3"; ?>" autocomplete="off" required>
                                            <label class="btn btn-outline-secondary option" for="<?php echo $qn . "3"; ?>" style="margin-top: 10px;"><?php echo $row['option3']; ?></label>
                                            <br>
                                            <input type="radio" value="option4" class="btn-check" name="option-for-<?php echo $qn; ?>" id="<?php echo $qn . "4"; ?>" autocomplete="off" required>
                                            <label class="btn btn-outline-secondary option" for="<?php echo $qn . "4"; ?>" style="margin-top: 10px;"><?php echo $row['option4']; ?></label>
                                            <br>
                                        </div>

                                    </div>
                                <?php $qn++;
                                } ?>
                                <div class="d-flex justify-content-end">
                                    <input type="hidden" name="enrollment" value="<?php echo $enrollment; ?>">
                                    <input type="hidden" name="student_name" value="<?php echo $student_name; ?>">
                                    <input type="hidden" name="noq" value="<?php echo $num; ?>">
                                    <input type="hidden" name="sem" value="<?php echo $sem; ?>">
                                    <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                                    <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">


                                    <button type="submit" onclick="back_to_home()" class="btn btn-success" style="margin-right: 3em;width:30%">Submit</button>
                            </form>
                            <form action="home_page.php" method="post" id="back_to_home">
                                <input type="hidden" name="enrollment" value="<?php echo $enrollment; ?>">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Semester <?php echo $sem . ": " . $subject_fullname; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure to quit test?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form action="home_page.php" method="post">
                        <input type="hidden" name="enrollment" value="<?php echo $enrollment; ?>">
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function countdown() {
            var minutes = 1; // Change this to the desired number of minutes
            var seconds = minutes * 60; // Convert minutes to seconds
            var countdownElement = document.getElementById('countdown');

            // Update countdown element every second
            var countdownInterval = setInterval(function() {
                minutes = Math.floor(seconds / 60); // Calculate remaining minutes
                var remainingSeconds = seconds % 60; // Calculate remaining seconds

                // Format the time display
                var display = minutes + ":" + (remainingSeconds < 10 ? "0" : "") + remainingSeconds;
                countdownElement.textContent = display;

                // If countdown reaches 0, redirect
                if (seconds <= 0) {
                    clearInterval(countdownInterval); // Stop the countdown
                    // Perform any action needed when countdown reaches 0
                    window.location.href='end_exam_warning_model.php';
                }

                seconds--; // Decrement seconds
            }, 1000); // 1000 milliseconds = 1 second
        }

        // Call the countdown function when the page loads
        countdown();



        function back_to_home() {
            window.close();
        }


        document.addEventListener("visibilitychange", function() {
            if (document.visibilityState === 'hidden') {

                window.location.href = 'warning_model.php';
            }
        });
    </script>
</body>


</html>