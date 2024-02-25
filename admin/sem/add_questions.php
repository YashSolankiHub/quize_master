<?php
include "../db_connection.php";

$subject = $_POST['subject'];
$number_of_question = $_POST['noq'];
$sem = $_POST['sem'];

// echo $number_of_question;
if ($sem == 1) {

    if ($subject == 'java') {
        for ($i = 1; $i <= $number_of_question; $i++) {
            $question = $_POST["question$i"];
            $option1 = $_POST["$i-1"];
            $option2 = $_POST["$i-2"];
            $option3 = $_POST["$i-3"];
            $option4 = $_POST["$i-4"];

            $answer = $_POST["ans-$i"];

            $insert_query = "INSERT INTO sem1_java(question, option1, option2, option3, option4, answer)
                    VALUES ('$question', '$option1', '$option2','$option3', '$option4', '$answer')";
            $conn->query($insert_query);
        }
        echo "<script>
                alert('Semester 1 - Core Java : Questions Added');
                window.location.href='../all_sem_select_subject.php';
                </script>";
    } elseif ($subject == 'python') {
        for ($i = 1; $i <= $number_of_question; $i++) {
            $question = $_POST["question$i"];
            $option1 = $_POST["$i-1"];
            $option2 = $_POST["$i-2"];
            $option3 = $_POST["$i-3"];
            $option4 = $_POST["$i-4"];

            $answer = $_POST["ans-$i"];

            $insert_query = "INSERT INTO sem1_python(question, option1, option2, option3, option4, answer)
                        VALUES ('$question', '$option1', '$option2','$option3', '$option4', '$answer')";
            $conn->query($insert_query);
        }
        echo "<script>
                alert('Semester 1 - Python Programming : Questions Added');
                window.location.href='../all_sem_select_subject.php';
                </script>";
    }
    elseif ($subject == 'dbms') {
        for ($i = 1; $i <= $number_of_question; $i++) {
            $question = $_POST["question$i"];
            $option1 = $_POST["$i-1"];
            $option2 = $_POST["$i-2"];
            $option3 = $_POST["$i-3"];
            $option4 = $_POST["$i-4"];

            $answer = $_POST["ans-$i"];

            $insert_query = "INSERT INTO sem1_dbms(question, option1, option2, option3, option4, answer)
                        VALUES ('$question', '$option1', '$option2','$option3', '$option4', '$answer')";
            $conn->query($insert_query);
        }
        echo "<script>
                alert('Semester 1 - Database Management System : Questions Added');
                window.location.href='../all_sem_select_subject.php';
                </script>";
    }
    elseif ($subject == 'dms') {
        for ($i = 1; $i <= $number_of_question; $i++) {
            $question = $_POST["question$i"];
            $option1 = $_POST["$i-1"];
            $option2 = $_POST["$i-2"];
            $option3 = $_POST["$i-3"];
            $option4 = $_POST["$i-4"];

            $answer = $_POST["ans-$i"];

            $insert_query = "INSERT INTO sem1_dms(question, option1, option2, option3, option4, answer)
                        VALUES ('$question', '$option1', '$option2','$option3', '$option4', '$answer')";
            $conn->query($insert_query);
        }
        echo "<script>
                alert('Semester 1 - Descrete Mathematics Structure : Questions Added');
                window.location.href='../all_sem_select_subject.php';
                </script>";
    }
    elseif ($subject == 'cs') {
        for ($i = 1; $i <= $number_of_question; $i++) {
            $question = $_POST["question$i"];
            $option1 = $_POST["$i-1"];
            $option2 = $_POST["$i-2"];
            $option3 = $_POST["$i-3"];
            $option4 = $_POST["$i-4"];

            $answer = $_POST["ans-$i"];

            $insert_query = "INSERT INTO sem1_cs(question, option1, option2, option3, option4, answer)
                        VALUES ('$question', '$option1', '$option2','$option3', '$option4', '$answer')";
            $conn->query($insert_query);
        }
        echo "<script>
                alert('Semester 1 - Communication Skills : Questions Added');
                window.location.href='../all_sem_select_subject.php';
                </script>";
    }
}
