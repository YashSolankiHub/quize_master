<?php
include "../db_connection.php";

$subject = $_POST['subject'];
$number_of_question = $_POST['noq'];

// echo $number_of_question;

if ($subject = 'java') {
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


}
