<?php
include "../db_connection.php";
$sem = $_POST['sem'];
$subject = $_POST['subject'];

if($sem == 1){


if($subject == 'java')
    {
        $delete_query = "DELETE FROM sem1_java";
        $conn->query($delete_query);

        echo "<script>
        alert('Semester 1 - Core Java : All Questions Deleted!');
        window.location.href='../show_question_all_sem.php';
        </script>";
    }
    elseif($subject == 'pyhton')
    {
        $delete_query = "DELETE FROM sem1_python";
        $conn->query($delete_query);

        echo "<script>
        alert('Semester 1 - Python Programming : All Questions Deleted!');
        window.location.href='../show_question_all_sem.php';
        </script>";
    }
    elseif($subject == 'dbms')
    {
        $delete_query = "DELETE FROM sem1_dbms";
        $conn->query($delete_query);

        echo "<script>
        alert('Semester 1 - Database Management System : All Questions Deleted!');
        window.location.href='../show_question_all_sem.php';
        </script>";
    }
    elseif($subject == 'dms')
    {
        $delete_query = "DELETE FROM sem1_dms";
        $conn->query($delete_query);

        echo "<script>
        alert('Semester 1 - Descrete Mathematics Structure : All Questions Deleted!');
        window.location.href='../show_question_all_sem.php';
        </script>";
    }
    elseif($subject == 'cs')
    {
        $delete_query = "DELETE FROM sem1_cs";
        $conn->query($delete_query);

        echo "<script>
        alert('Semester 1 - Communication Skills : All Questions Deleted!');
        window.location.href='../show_question_all_sem.php';
        </script>";
    }
}

?>

