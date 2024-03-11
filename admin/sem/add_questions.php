<?php
include "../db_connection.php";

$subject = $_POST['subject'];
$number_of_question = $_POST['noq'];
$sem = $_POST['sem'];
$time = $_POST['time'];
$title = $_POST['title'];




if ($subject == 'java') {
    $subject_fullname = "Core Java";
    $subject_code = "23MCA101";
    $d = date('Y-m-d_H:i:s');
    $exam_id = $subject_code."_".$d;
} elseif ($subject == 'python') {
    $subject_fullname = "Python Programming";
    $subject_code = "23MCA102";
    $d = date('Y-m-d H:i:s');
    $exam_id = $subject_code."_".$d;
} elseif ($subject == 'dbms') {
    $subject_fullname = "Database Management System";
    $subject_code = "23MCA103";
    $d = date('Y-m-d H:i:s');
    $exam_id = $subject_code."_".$d;
} elseif ($subject == 'dms') {
    $subject_fullname = "Descrete Mathematics Structure";
    $subject_code = "23MCA104";
    $d = date('Y-m-d H:i:s');
    $exam_id = $subject_code."_".$d;
} elseif ($subject == 'cs') {
    $subject_fullname = "Communication Skills";
    $subject_code = "23MCA105";
    $d = date('Y-m-d H:i:s');
    $exam_id = $subject_code."_".$d;
}

for ($i = 1; $i <= $number_of_question; $i++) {
    $question = $_POST["question$i"];
    $option1 = $_POST["$i-1"];
    $option2 = $_POST["$i-2"];
    $option3 = $_POST["$i-3"];
    $option4 = $_POST["$i-4"];

    $answer = $_POST["ans-$i"];

    $insert_query = "INSERT INTO questions(exam_id,question_title, question, option1, option2, option3, option4, answer, semester, subject, subject_code, time_minutes, date)
                    VALUES ('$exam_id','$title','$question', '$option1', '$option2','$option3', '$option4', '$answer', '$sem', '$subject','$subject_code', '$time', NOW())";
    $conn->query($insert_query);
}
echo "<script>
                alert('Semester $sem - $subject_fullname : Questions Added');
                window.location.href='../all_sem_select_subject.php';
                </script>";
