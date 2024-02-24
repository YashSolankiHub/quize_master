<?php
$number_of_question = $_POST['noq'];
$time = $_POST['time'];
$sem = $_POST['sem'];
$subject = $_POST['subject'];

// echo $number_of_question;
// echo "<br>";
// echo $time;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Number of questions and time</title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
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
                        <li class="nav-item " style="border:1px solid white;border-radius:15px">
                            <a class="nav-link active " aria-current="page" href="../all_sem_select_subject.php" style="color: white;">Add Questions</a>
                        </li>
                        <li class="nav-item ">
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
                            <h3>: <?php if ($subject == 'java') {
                                        echo "Core Java";
                                    } ?></h3>
                        </div>
                        <form action="add_questions.php" method="post">
                            <?php
                            for ($i = 1; $i <= $number_of_question; $i++) { ?>

                                <div class="form-floating">
                                    <input type="text" class="form-control" name="question<?php echo $i; ?>" id="q" style="height: 100px" required></input>
                                    <label for="q" style="font-size: 24px;">Question <?php echo $i; ?></label>
                                </div>
                                <div class="form-floating option_topmargin">
                                    <input type="text" name="<?php echo $i; ?>-1" class="form-control fs-option" id="1" placeholder="Option 1" required>
                                    <label for="1">option 1</label>
                                </div>
                                <div class="form-floating option_topmargin">
                                    <input type="text" name="<?php echo $i; ?>-2" class="form-control fs-option" id="2" placeholder="Option 1"  required>
                                    <label for="2">option 2</label>
                                </div>
                                <div class="form-floating option_topmargin">
                                    <input type="text" name="<?php echo $i; ?>-3" class="form-control fs-option" id="3" placeholder="Option 1"  required>
                                    <label for="3">option 3</label>
                                </div>
                                <div class="form-floating option_topmargin">
                                    <input type="text" name="<?php echo $i; ?>-4" class="form-control fs-option" id="4" placeholder="Option 1"  required>
                                    <label for="4">option 4</label>
                                </div>

                                
                                <br>
                                <div class="form-floating">
                                    <select class="form-select" name="ans-<?php echo $i;?>" style="font-size: 14px;" id="floatingSelect" aria-label="Floating label select example">
                                        <option value="option1">Option 1</option>
                                        <option value="option2">Option 2</option>
                                        <option value="option3">Option 3</option>
                                        <option value="option4">Option 4</option>
                                    </select>
                                    <label for="floatingSelect">Select Answer</label>
                                </div>
                                <hr style="opacity: 1;">

                            <?php } ?>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" style="background-color: rgb(47, 79, 79);border:none;">Submit</button>
                            </div>
                            <input type="hidden" name="subject" value="<?php echo $subject;?>">
                            <input type="hidden" name="noq" value="<?php echo $number_of_question;?>">
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</body>

</html>