<?php
include "../db_connection.php";
$subject = $_POST['subject'];

if($subject == 'java')
    {
        $delete_query = "DELETE FROM sem1_java";
        $conn->query($delete_query);

        echo "<script>
        alert('Semester 1 - Core Java : All Questions Deleted!');
        window.location.href='../show_question_all_sem.php';
        </script>";
    }

?>

