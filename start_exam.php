<?php
include "db_connection.php";
$sem = $_POST['sem'];
$subject = $_POST['subject'];
$student_name = $_POST['student_name'];
$enrollment = $_POST['enrollment'];


// echo $sem;
// echo "<br>";
// echo $subject;
// echo "<br>";
// echo $student_name;
// echo "<br>";
// echo $enrollment;

if ($sem == 1) {
    if ($subject == 'java') {
        $select = "SELECT *FROM sem1_java";
        $result = $conn->query($select);
        $num = mysqli_num_rows($result);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/home_page.css">
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
            color: rgb(108, 117, 125);
            border: 1px solid rgb(108, 117, 125);
            width: 60%;
            text-align: left;
        }

        .option:hover {
            background-color: rgb(108, 117, 125);
            color: white;

        }
    </style>
</head>

<body>

    <div class="semester">


        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card for_card for_left_side_card">

                    <div class="card-body">
                        <div class="question">
                            <h2 class="card-title center_all_semester_head">Semester <?php echo $sem;?>: <?php if($subject == 'java'){echo " Core Java";}
                        elseif($subject == 'python'){echo " Python Programming";} 
                        elseif($subject == 'dbms'){echo " Database Management System";}
                        elseif($subject == 'dms'){echo " Descrete Mathematics Structure";}
                        elseif($subject == 'cs'){echo " Communication Skills";}?></h2>
                            <div class="container">
                                <?php  $qn=1;while($row = mysqli_fetch_assoc($result)){ ?>
                                <div class="question" style="margin-bottom: 20px;">
                                    <h5 style="text-align: left;"> Q<?php echo $qn.": ".$row['question'] ?>
                                    </h5>
                                    <input type="radio" class="btn-check" name="options-for-<?php echo $qn;?>" id="<?php echo $qn."1";?>" autocomplete="off">
                                    <label class="btn btn-outline-secondary option" for="<?php echo $qn."1";?>" style="margin-top: 10px;"><?php echo $row['option1'];?></label>
                                    <br>
                                    <input type="radio" class="btn-check" name="options-for-<?php echo $qn;?>" id="<?php echo $qn."2";?>" autocomplete="off">
                                    <label class="btn btn-outline-secondary option" for="<?php echo $qn."2";?>" style="margin-top: 10px;"><?php echo $row['option2'];?></label>
                                    <br>
                                    <input type="radio" class="btn-check" name="options-for-<?php echo $qn;?>" id="<?php echo $qn."3";?>" autocomplete="off">
                                    <label class="btn btn-outline-secondary option" for="<?php echo $qn."3";?>" style="margin-top: 10px;"><?php echo $row['option3'];?></label>
                                    <br>
                                    <input type="radio" class="btn-check" name="options-for-<?php echo $qn;?>" id="<?php echo $qn."4";?>" autocomplete="off">
                                    <label class="btn btn-outline-secondary option" for="<?php echo $qn."4";?>" style="margin-top: 10px;"><?php echo $row['option4'];?></label>
                                    <br>
                                </div>
                                <?php $qn++;} ?>
                                



                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>

</body>

</html>