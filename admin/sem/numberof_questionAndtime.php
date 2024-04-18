<?php

include "../db_connection.php";

$subject = $_POST['subject'];
$sem = $_POST['sem'];
// echo $sem;

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



if ($subject == "0") {
    echo "<script>
        window.location.href='../all_sem_select_subject.php';
        </script>";
}

$select = "SELECT *FROM questions WHERE subject_code = '$subject_code'";
$result = $conn->query($select);
$num = $result->num_rows;

if($num > 0)
    {
        echo "
        <script>
            alert('Please delete current available qustions!')
        </script>";
        echo "<script>
        window.location.href='../all_sem_select_subject.php';
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

    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="margin-top: -8px;">
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
                            <a class="nav-link active " aria-current="page" href="../show_question_all_sem.php" style="color: white;">Show Current Questions</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="show_past_questions.php" style="color: white;">Show Past questions</a>
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
                <div class="card for_card for_left_side_card">

                    <div class="card-body">
                        <h3 class="card-title center_all_semester_head">Semester <?php echo $sem ; ?></h3>
                        <form action="add_questions_page.php" method="post">
                        <input type="text" class="form-control" id="" placeholder="Subject :<?php if($subject == 'java'){echo " Core Java";}
                        elseif($subject == 'python'){echo " Python Programming";} 
                        elseif($subject == 'dbms'){echo " Database Management System";}
                        elseif($subject == 'dms'){echo " Descrete Mathematics Structure";}
                        elseif($subject == 'cs'){echo " Communication Skills";}?>" disabled>
                        
                        <br>
                        <input type="text" name="title" class="form-control" id="" placeholder="Give question title"  required>
                        <br>
                        <input type="number" name="noq" class="form-control" id="" placeholder="Number Of Questions"  required>
                        <br>
                        <select id="" name="time" class="form-select">
                            <option value="5">5 Minutes</option>
                            <option value="10">10 Minutes</option>
                            <option value="15">15 Minutes</option>
                            <option value="20">20 Minutes</option>
                            <option value="25">25 Minutes</option>
                        </select>
                        <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" style="background-color: rgb(47, 79, 79);border:none;width:100px;">Next</button>
                        </div>
                        <input type="hidden" name="sem" value="<?php echo $sem; ?>">
                        <input type="hidden" name="subject" value="<?php echo $subject; ?>">

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

</body>

</html>