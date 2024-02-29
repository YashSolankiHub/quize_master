<?php

include "db_connection.php";

$sem = $_POST['sem'];
$subject = $_POST['subject'];
$student_name = $_POST['student_name'];
$enrollment = $_POST['enrollment'];
$number_of_question = $_POST['noq'];


if ($subject == 'java') {
    $subject_fullname = "Core Java";
    $subject_code = "23MCA101";
} elseif ($subject == 'python') {
    $subject_fullname = "Python Programming";
    $subject_code = "23MCA102";
} elseif ($subject == 'dbms') {
    $subject_fullname = "Database Management System";
    $subject_code = "23MCA103";
} elseif ($subject == 'dms') {
    $subject_fullname = "Descrete Mathematics Structure";
    $subject_code = "23MCA104";
} elseif ($subject == 'cs') {
    $subject_fullname = "Communication Skills";
    $subject_code = "23MCA105";
}


// echo $sem." ". $subject." ".$student_name." ". $enrollment." ".$number_of_question;

$select = "SELECT *FROM questions WHERE semester = $sem AND subject = '$subject'";
$result = $conn->query($select);
$result1 = $conn->query($select);

$num = mysqli_num_rows($result);
$total_question = $num;
$qn = 1;
$correct = 0;
$wrong = 0;
while ($row1 = mysqli_fetch_assoc($result)) {
    $selected_option = $_POST["option-for-$qn"];
    if ($selected_option == $row1['answer']) {
        $correct++;
    } else {
        $wrong++;
    }
    $qn++;
}
// echo "Correct :".$correct;
// echo "<br>";
// echo "wrong :".$wrong;
$per = ($correct * 100) / $total_question;

// $insert = "INSERT INTO result(enrollment, student_name, semester, subject_code, subject, total_question, correct, wrong, percentage, date) 
// VALUES ('$enrollment','$student_name', $sem, '$subject_code', '$subject', $total_question, $correct, $wrong, $per, NOW())";
// $conn->query($insert);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result: <?php echo $subject_fullname?></title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/home_page.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <style>
        .container {
            max-width: 120%;
            width: 95%;
            text-align: left;
        }

        .for_card {
            margin-left: 21.8em;
            width: 110%;
        }

        .option {
            color: black;
            border: 1px solid black;
            width: 60%;
            text-align: left;
        }

        .txt {
            width: 60%;
            margin-top: 10px;
            border: 1px solid black;
            color: black;
        }

        .correct-sign {
            width: 100px;
            height: 100px;
            position: relative;
        }

        .check {
            width: 12px;
            height: 29px;
            border-right: 5px solid rgb(25, 135, 84);
            border-bottom: 5px solid rgb(25, 135, 84);
            transform: rotate(45deg);
            margin-left: 18px;
            margin-top: 7px;
        }

        .wrong {
            color: red;

            font-size: 31px;
            font-weight: 500;
            margin-left: 9px;
            margin-top: 0px;
            margin-bottom: 0px;
            position: relative;
            top: 6px;
        }
  
    </style>

</head>

<body>

    <div class="semester">


        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card for_card for_left_side_card">
                    <h2 class="card-title center_all_semester_head"> Semester <?php echo $sem . ":" . $subject_fullname; ?></h2>
                    <div class="card-body">


                        <div class="question">
                            <form action="check_answer.php" method="post">
                                <div class="d-flex justify-content-center">
                                    <input type="text" style="background-color: rgb(25, 135, 84);width:45%;color:white;text-align:center;" class="form-control" value="Correct: <?php echo $correct; ?>" disabled>
                                    <input type="text" style="background-color: rgb(220, 53, 69);width:45%;color:white;text-align:center;" class="form-control" value="Wrong: <?php echo $wrong; ?>" disabled>

                                </div>
                                <?php $qn = 1;

                                while ($row = mysqli_fetch_assoc($result1)) {
                                    $answer = $row['answer'];
                                    $selected_option = $_POST["option-for-$qn"];
                                    // echo $selected_option;
                                    // echo $answer;
                                ?>
                                    <div class="container" style="margin-bottom: 20px;">
                                        <div class="question" style="margin-bottom: 20px;">
                                            <h5 style="text-align: left;"> Q<?php echo $qn . ": " . $row['question'] ?>
                                            </h5>
                                            <?php
                                            if ($answer == "option1" and $selected_option == "option1") { ?>

                                                <div class="d-flex" style="height: 47.5px;">
                                                    <input type="radio" value="option1" class="btn-check h" name="" id="" style="color:white;">
                                                    <label class="btn btn-success option" for="" style="margin-top: 10px;color:white;"><?php echo $row['option1']; ?></label>
                                                    <div class="correct-sign">
                                                        <div class="check"></div>
                                                    </div>
                                                </div>
                                                
                                            <?php } elseif($answer == "option1" and $selected_option != "option1") { ?>
                                                <input type="radio" value="option1" class="btn-check" name="" id="" style="color:white;" disabled>
                                                    <label class="btn btn-success option" for="" style="margin-top: 10px;color:white;"><?php echo $row['option1']; ?></label>
                                                    <div class="d-flex justify-content-end">
                                                    <div style="color: rgb(25, 135, 84);margin-top:-25px;"> <b>Correct answer</b></div>
                                                    </div>
                                                    
                                            <?php } elseif ($selected_option == "option1") { ?>
                                                <div class="d-flex">
                                                    <input type="text" style="background-color: rgb(220, 53, 69);color:white;" value="<?php echo $row['option1'] ?>" class="form-control txt" disabled>
                                                    <span class="wrong"><b>X</b></span>
                                                </div>
                                            <?php } else { ?>
                                                <input type="text" value="<?php echo $row['option1'] ?>" class="form-control txt" disabled>

                                            <?php } ?>

                                            <?php
                                            if ($answer == "option2" and $selected_option == "option2") { ?>

                                                <div class="d-flex" style="height: 47.5px;">
                                                    <input type="radio" value="option1" class="btn-check" name="" id="" style="color:white;">
                                                    <label class="btn btn-success option" for="" style="margin-top: 10px;color:white;"><?php echo $row['option2']; ?></label>
                                                    <div class="correct-sign">
                                                        <div class="check"></div>
                                                    </div>
                                                </div>
                                                
                                            <?php } elseif($answer == "option2" and $selected_option != "option2") { ?>
                                                <input type="radio" value="option1" class="btn-check" name="" id="" style="color:white;" disabled>
                                                    <label class="btn btn-success option" for="" style="margin-top: 10px;color:white;"><?php echo $row['option2']; ?></label>
                                                    <div class="d-flex justify-content-end">
                                                    <div style="color: rgb(25, 135, 84);margin-top:-25px;"> <b>Correct answer</b></div>
                                                    </div>
                                            <?php } elseif ($selected_option == "option2") { ?>
                                                <div class="d-flex">
                                                    <input type="text" style="background-color: rgb(220, 53, 69);color:white;" value="<?php echo $row['option2'] ?>" class="form-control txt" disabled>
                                                    <span class="wrong"><b>X</b></span>
                                                </div>
                                            <?php } else { ?>
                                                <input type="text" value="<?php echo $row['option2'] ?>" class="form-control txt" disabled>

                                            <?php } ?>


                                            <?php
                                            if ($answer == "option3" and $selected_option == "option3") { ?>

                                                <div class="d-flex" style="height: 47.5px;">
                                                    <input type="radio" value="option1" class="btn-check" name="" id="" style="color:white;">
                                                    <label class="btn btn-success option" for="" style="margin-top: 10px;color:white;"><?php echo $row['option3']; ?></label>
                                                    <div class="correct-sign">
                                                        <div class="check"></div>
                                                    </div>
                                                </div>
                                                
                                            <?php } elseif($answer == "option3" and $selected_option != "option3") { ?>
                                                <input type="radio" value="option1" class="btn-check" name="" id="" style="color:white;" disabled>
                                                    <label class="btn btn-success option" for="" style="margin-top: 10px;color:white;"><?php echo $row['option3']; ?></label>
                                                    <div class="d-flex justify-content-end">
                                                    <div style="color: rgb(25, 135, 84);margin-top:-25px;"> <b>Correct answer</b></div>
                                                    </div>
                                            <?php } elseif ($selected_option == "option3") { ?>
                                                <div class="d-flex">
                                                    <input type="text" style="background-color: rgb(220, 53, 69);color:white;" value="<?php echo $row['option3'] ?>" class="form-control txt" disabled>
                                                    <span class="wrong"><b>X</b></span>
                                                </div>
                                            <?php } else { ?>
                                                <input type="text" value="<?php echo $row['option3'] ?>" class="form-control txt" disabled>

                                            <?php } ?>

                                            <?php
                                            if ($answer == "option4" and $selected_option == "option4") { ?>

                                                <div class="d-flex" style="height: 47.5px;">
                                                    <input type="radio" value="option1" class="btn-check" name="" id="" style="color:white;">
                                                    <label class="btn btn-success option" for="" style="margin-top: 10px;color:white;"><?php echo $row['option4']; ?></label>
                                                    <div class="correct-sign">
                                                        <div class="check"></div>
                                                    </div>
                                                </div>
                                                
                                            <?php } elseif($answer == "option4" and $selected_option != "option4") { ?>
                                                <input type="radio" value="option1" class="btn-check" name="" id="" style="color:white;" disabled>
                                                    <label class="btn btn-success option" for="" style="margin-top: 10px;color:white;"><?php echo $row['option4']; ?></label>
                                                    <div class="d-flex justify-content-end">
                                                    <div style="color: rgb(25, 135, 84);margin-top:-25px;"> <b>Correct answer</b></div>
                                                    </div>
                                            <?php } elseif ($selected_option == "option4") { ?>
                                                <div class="d-flex">
                                                    <input type="text" style="background-color: rgb(220, 53, 69);color:white;" value="<?php echo $row['option4'] ?>" class="form-control txt" disabled>
                                                    <span class="wrong"><b>X</b></span>
                                                </div>
                                            <?php } else { ?>
                                                <input type="text" value="<?php echo $row['option4'] ?>" class="form-control txt" disabled>

                                            <?php } ?>

                                            <br>

                                        </div>

                                    </div>
                                <?php $qn++;
                                } ?>
                                <div class="d-flex justify-content-end">
                                    <input type="hidden" name="enrollment" value="<?php echo $enrollment; ?>">
                                    <input type="hidden" name="student_name" value="<?php echo $student_name; ?>">
                                    <input type="hidden" name="noq" value="<?php echo $num; ?>">
                                    <input type="hidden" name="sem" value="<?php echo $sem; ?>">
                                    <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                                    <button type="submit" class="btn btn-success" style="margin-right: 3em;width:30%">Submit</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
    </div>


</body>


</html>