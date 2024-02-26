<?php
$subject = $_POST['subject'];
$sem = $_POST['sem'];
$student_name = $_POST['student_name'];
$enrollment = $_POST['enrollment'];
// echo $sem;


if ($subject == "0") {
    echo "<script>
        window.location.href='../all_sem_select_subject.php';
        </script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Students</title>
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
                <h3 class="modal-title" id="exampleModalLabel">Semester: <?php echo $sem;
                                                                            if ($subject == 'java') {
                                                                                echo " Core Java";
                                                                            } elseif ($subject == 'python') {
                                                                                echo " Python Programming";
                                                                            } elseif ($subject == 'dbms') {
                                                                                echo " Database Management System";
                                                                            } elseif ($subject == 'dms') {
                                                                                echo " Descrete Mathematics Structure";
                                                                            } elseif ($subject == 'cs') {
                                                                                echo " Communication Skills";
                                                                            } ?> </h3>
            </div>
            <div class="modal-body">
                <form action="start_exam.php" method="post" id="exam_sure">
                    <h4>Exam starts in <span id="countdown">10</span> seconds </h4>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a class="btn btn-secondary" href="home_page.php">Close</a>
                <input type="hidden" name="sem" value="<?php echo $sem;?>">
                <input type="hidden" name="subject" value="<?php echo $subject;?>">
                <input type="hidden" name="student_name" value="<?php echo $student_name;?>">
                <input type="hidden" name="enrollment" value="<?php echo $enrollment;?>">
                
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
</script>
</body>

</html>