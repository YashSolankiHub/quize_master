<?php
session_start();
include "../db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sem = $_POST['sem'];
    $subject = $_POST['subject'];
} else {
    $sem = $_SESSION['sem'];
    $subject = $_SESSION['subject'];
}

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



$select_query = "SELECT *FROM questions WHERE semester = '$sem' AND subject = '$subject'";
$result = $conn->query($select_query);
$num = mysqli_num_rows($result);

if ($num == 0) {
    echo "<script>
            alert('Semester $sem - $subject_fullname : No questions Available!')
            window.location.href = '../show_question_all_sem.php';
            </script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Number of questions and time</title>
    <link rel="icon" href="../logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/home_page.css">
    <style>
        .option_topmargin {
            margin-top: 10px;
        }

        .fs-option {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="margin-top: -14px; position:fixed; z-index:1;width:100%">
            <div class="container-fluid color_for_container-fluid">
                <a class="navbar-brand color_for_nav_text" href="#">QuizMaster</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse nested_nav" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="../home_page.php" style="color: white;">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="../show_students.php" style="color: white;">Students</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="../all_sem_select_subject.php" style="color: white;">Add Questions</a>
                        </li>
                        <li class="nav-item " style="border:1px solid white;border-radius:15px">
                            <a class="nav-link active " aria-current="page" href="../show_question_all_sem.php" style="color: white;">Show Questions</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">
                        <button type="button" class="btn btn-light" onclick="home()" style="margin-right: 26px;">Logout</button>
                    </form>
                    <script>
                        function home() {

                            window.location.href = "destroy_login_session.php";

                        }
                    </script>
                </div>
            </div>
        </nav>
    </header>
    <div class="semester">


        <div class="row row-cols-1 row-cols-md-2 g-4 d-flex justify-content-center">
            <div class="col">
                <div class="card for_card for_left_side_card" style="margin-top: 50px;">

                    <div class="card-body">
                        <div class="d-flex">
                            <h3 class="card-title center_all_semester_head">Semester <?php echo $sem; ?></h3>
                            <h3>: <?php echo $subject_fullname;
                                    ?></h3>

                        </div>

                        <form action="delete_question.php" method="post" id="dq">
                            <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                            <input type="hidden" name="sem" value="<?php echo $sem; ?>">
                            <div class="d-flex justify-content-end">
                                <button id="dq" type="submit" class="btn btn-danger">Delete all questions</button>
                            </div>
                        </form>
                        <form action="update_question.php" method="post">
                            <?php

                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <input type="hidden" name="sr_no" value="<?php echo $row['sr_no']; ?>">

                                <div class="form-floating">
                                    <input type="text" class="form-control" name="question<?php echo $i; ?>" id="q" style="height: 100px" value="<?php echo $row['question']; ?>" required></input>
                                    <label for="q" style="font-size: 24px;positon:absolute;z-index:0;">Question <?php echo $i; ?></label>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="delete_single_question.php?no=<?php echo $row['sr_no']; ?>&sem=<?php echo $sem; ?>&subject=<?php echo $subject; ?>">Delete question</a>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" name="<?php echo $i; ?>-1" class="form-control fs-option" id="1" placeholder="Option 1" value="<?php echo $row['option1'] ?>" required>
                                    <label for="1" style="position:absolute;z-index:0;">option 1</label>
                                </div>
                                <div class="form-floating option_topmargin">
                                    <input type="text" name="<?php echo $i; ?>-2" class="form-control fs-option" id="2" placeholder="Option 1" value="<?php echo $row['option2'] ?>" required>
                                    <label for="2" style="position:absolute;z-index:0;">option 2</label>
                                </div>
                                <div class="form-floating option_topmargin">
                                    <input type="text" name="<?php echo $i; ?>-3" class="form-control fs-option" id="3" placeholder="Option 1" value="<?php echo $row['option3'] ?>" required>
                                    <label for="3" style="position:absolute;z-index:0;">option 3</label>
                                </div>
                                <div class="form-floating option_topmargin">
                                    <input type="text" name="<?php echo $i; ?>-4" class="form-control fs-option" id="4" placeholder="Option 1" value="<?php echo $row['option4'] ?>" required>
                                    <label for="4" style="position:absolute;z-index:0;">option 4</label>
                                </div>

                                <br>
                                <div class="form-floating">
                                    <select class="form-select" name="ans-<?php echo $i; ?>" style="font-size: 14px;" id="floatingSelect" aria-label="Floating label select example">
                                        <option value="option1" <?php if ($row['answer'] == 'option1') {
                                                                    echo 'selected';
                                                                } ?>>Option 1</option>
                                        <option value="option2" <?php if ($row['answer'] == 'option2') {
                                                                    echo 'selected';
                                                                } ?>>Option 2</option>
                                        <option value="option3" <?php if ($row['answer'] == 'option3') {
                                                                    echo 'selected';
                                                                } ?>>Option 3</option>
                                        <option value="option4" <?php if ($row['answer'] == 'option4') {
                                                                    echo 'selected';
                                                                } ?>>Option 4</option>
                                    </select>
                                    <label for="floatingSelect" style="position:absolute;z-index:0;">Select Answer</label>
                                </div>

                                <hr style="opacity: 1;">

                            <?php $i++;
                            } ?>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" style="background-color: rgb(47, 79, 79);border:none;">Save Changes</button>
                            </div>
                            <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                            <input type="hidden" name="sem" value="<?php echo $sem; ?>">
                            <input type="hidden" name="noq" value="<?php echo $num; ?>">
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</body>

</html>