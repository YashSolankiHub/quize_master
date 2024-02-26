<?php
session_start();
include "../db_connection.php";
$sr_no = $_GET['no'];
$sem = $_GET['sem'];
$subject = $_GET['subject'];


$delete_single_query = "DELETE FROM questions WHERE sr_no = $sr_no AND semester = $sem AND subject = '$subject'";
$conn->query($delete_single_query);
$_SESSION['sem'] = $sem;
$_SESSION['subject'] = $subject;
echo "<script>
        window.location.href = 'show_question_page.php';
    </script>";
?>