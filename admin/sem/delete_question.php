<?php
include "../db_connection.php";
$sem = $_POST['sem'];
$subject = $_POST['subject'];

if ($subject == 'java') {
    $subject_fullname = "Core Java";
} elseif ($subject == 'python') {
    $subject_fullname = "Python Programming";
} elseif ($subject == 'dbms') {
    $subject_fullname ="Database Management System";
} elseif ($subject == 'dms') {
    $subject_fullname = "Descrete Mathematics Structure";
} elseif ($subject == 'cs') {
    $subject_fullname = "Communication Skills";
}


$delete_query = "DELETE FROM questions WHERE semester = $sem AND subject = '$subject'";
$conn->query($delete_query);

echo "<script>
        alert('Semester $sem - $subject_fullname : All Questions Deleted!');
        window.location.href='../show_question_all_sem.php';
    </script>";
?>