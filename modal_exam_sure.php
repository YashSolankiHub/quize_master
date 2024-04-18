<?php
include "db_connection.php";
$subject = $_POST['subject'];
$sem = $_POST['sem'];
$student_name = $_POST['student_name'];
$enrollment = $_POST['enrollment'];

date_default_timezone_set('Asia/Kolkata');




if ($subject == "0") {
    echo "<script>
        window.location.href='home_page.php';
        </script>";
}


if ($subject == 'java') {
    $subject_fullname = "Core Java";
    $subject_code = "23MCA101";
    
    
    
} elseif ($subject == 'python') {
    $subject_fullname = "Python Programming";
    $subject_code = "23MCA102";

} elseif ($subject == 'dbms') {
    $subject_fullname = "Database Management System";
    $subject_code = "23MCA103";

} elseif ($subject == 'dms') {
    $subject_fullname = "Descrete Mathematics Structure";
    $subject_code = "23MCA104";

} elseif ($subject == 'cs') {
    $subject_fullname = "Communication Skills";
    $subject_code = "23MCA105";

}

$s = "SELECT *FROM questions WHERE semester = $sem AND subject = '$subject' LIMIT 1";
$r = $conn->query($s);
$row = mysqli_fetch_assoc($r);

$exam_id = $row['exam_id'];

// echo $exam_id;

$sql = "SELECT *FROM questions WHERE semester = $sem AND subject = '$subject'";
$result = $conn->query($sql);
$num = mysqli_num_rows($result);

$select = "SELECT *FROM result WHERE enrollment = '$enrollment' AND subject_code = '$subject_code' AND exam_id = '$exam_id'";
$execute = $conn->query($select);
$num1 = mysqli_num_rows($execute);

if (!($num > 0)) {
    echo "<script>
        alert('Semester $sem - $subject_fullname : Questions not available at this moment!');
        window.location.href='home_page.php';
        </script>";
} elseif ($num1) {
    echo "<script>
        alert('Semester $sem - $subject_fullname : You have already given this exam');
        window.location.href='home_page.php';
        </script>";
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam:<?php echo " " . $subject_fullname;  ?></title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>
</head>

<div class="modal fade" id="myModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Semester <?php echo $sem . ": " . $subject_fullname; ?></h3>
            </div>
            <div class="modal-body">
                <form action="start_exam.php" method="post" id="exam_sure" target="_blank">
                    <h4>Exam starts in <span id="countdown">10</span> seconds </h4>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a class="btn btn-secondary" href="home_page.php">Close</a>
                <input type="hidden" name="sem" value="<?php echo $sem; ?>">
                <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                <input type="hidden" name="student_name" value="<?php echo $student_name; ?>">
                <input type="hidden" name="enrollment" value="<?php echo $enrollment; ?>">
                <input type="hidden" name="date" value="<?php echo $date; ?>">
                <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">

                </form>


                <form action="home_page.php" method="post" id="back_to_home">
                    <input type="hidden" name="enrollment" value="<?php echo $enrollment; ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function back() {
        window.location.href = 'show_students.php';
    }

    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
    myModal.show()

    function countdown() {
        var seconds = 10; // Change this to the desired number of seconds
        var countdownElement = document.getElementById('countdown');

        // Update countdown element every second
        var countdownInterval = setInterval(function() {
            seconds--;
            countdownElement.textContent = seconds;

            // If countdown reaches 0, redirect
            if (seconds <= 0) {
                clearInterval(countdownInterval); // Stop the countdown
                document.getElementById('exam_sure').submit();

            }
        }, 1000); // 1000 milliseconds = 1 second
    }

    // Call the countdown function when the page loads
    countdown();


    function countdown1() {
        var second1 = 11; // Change this to the desired number of seconds

        // Update countdown element every second
        var countdownInterval1 = setInterval(function() {
            second1--;

            // If countdown reaches 0, redirect
            if (second1 <= 0) {
                clearInterval(countdownInterval1); // Stop the countdown
                document.getElementById('back_to_home').submit();
                window.close();
            }
        }, 1000); // 1000 milliseconds = 1 second
    }


    countdown1();
</script>
</body>

</html>