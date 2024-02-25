<?php
include "../db_connection.php";

$sem = $_POST['sem'];
$subject = $_POST['subject'];
$number_of_question = $_POST['noq'];

// echo $number_of_question;
if ($sem == 1) {


    if ($subject == 'java') {
        $select_query = "SELECT *FROM sem1_java";
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
            $update_query = "UPDATE sem1_java SET question = '$question', 
        option1='$option1', option2='$option2', option3='$option3', option4 ='$option4',
        answer = '$answer' WHERE sr_no = $sr_no";

            $conn->query($update_query);
        }
        echo "<script>
                alert('Semester 1 - Core Java : Questions Updated');
                window.location.href='../show_question_all_sem.php';
                </script>";
    } elseif ($subject == 'python') {
        $select_query = "SELECT *FROM sem1_python";
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
            $update_query = "UPDATE sem1_python SET question = '$question', 
        option1='$option1', option2='$option2', option3='$option3', option4 ='$option4',
        answer = '$answer' WHERE sr_no = $sr_no";

            $conn->query($update_query);
        }
        echo "<script>
                alert('Semester 1 - Python Programming : Questions Updated');
                window.location.href='../show_question_all_sem.php';
                </script>";
    } elseif ($subject == 'dbms') {
        $select_query = "SELECT *FROM sem1_dbms";
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
            $update_query = "UPDATE sem1_dbms SET question = '$question', 
        option1='$option1', option2='$option2', option3='$option3', option4 ='$option4',
        answer = '$answer' WHERE sr_no = $sr_no";

            $conn->query($update_query);
        }
        echo "<script>
                alert('Semester 1 - Database Management System : Questions Updated');
                window.location.href='../show_question_all_sem.php';
                </script>";
    } elseif ($subject == 'dms') {
        $select_query = "SELECT *FROM sem1_dms";
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
            $update_query = "UPDATE sem1_dms SET question = '$question', 
        option1='$option1', option2='$option2', option3='$option3', option4 ='$option4',
        answer = '$answer' WHERE sr_no = $sr_no";

            $conn->query($update_query);
        }
        echo "<script>
                alert('Semester 1 - Descrete Mathematics Structure : Questions Updated');
                window.location.href='../show_question_all_sem.php';
                </script>";
    } elseif ($subject == 'cs') {
        $select_query = "SELECT *FROM sem1_cs";
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
            $update_query = "UPDATE sem1_cs SET question = '$question', 
        option1='$option1', option2='$option2', option3='$option3', option4 ='$option4',
        answer = '$answer' WHERE sr_no = $sr_no";

            $conn->query($update_query);
        }
        echo "<script>
                alert('Semester 1 - Communication Skills : Questions Updated');
                window.location.href='../show_question_all_sem.php';
                </script>";
    }
}
