<?php
include "../db_connection.php";

$sem = $_POST['sem'];
$subject = $_POST['subject'];
$number_of_question = $_POST['noq'];

// echo $number_of_question;
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




$select_query = "SELECT *FROM questions WHERE semester = $sem AND subject = '$subject'";
$result = $conn->query($select_query);


for ($i = 1; $i <= $number_of_question; $i++) {
    $question = $_POST["question$i"];
    $option1 = $_POST["$i-1"];
    $option2 = $_POST["$i-2"];
    $option3 = $_POST["$i-3"];
    $option4 = $_POST["$i-4"];

    $answer = $_POST["ans-$i"];

    while ($row = mysqli_fetch_assoc($result)) {
        $sr_no = $row['sr_no'];


        echo $sr_no . "<br>";
    }
    $update_query = "UPDATE questions SET question = '$question', 
        option1='$option1', option2='$option2', option3='$option3', option4 ='$option4',
        answer = '$answer' WHERE sr_no = $sr_no AND semester = $sem AND subject = '$subject'";

    $conn->query($update_query);
}
echo "<script>
        alert('Semester $sem - $subject_fullname : Questions Updated');
        window.location.href='../show_question_all_sem.php';
    </script>";
?>