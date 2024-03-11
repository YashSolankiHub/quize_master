

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Questions</title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/home_page.css">
    <style>

    </style>
</head>

<body >
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
                            <a class="nav-link active " aria-current="page" href="home_page.php" style="color: white;">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="show_students.php" style="color: white;">Students</a>
                        </li>
                        <li class="nav-item " style="border:1px solid white;border-radius:15px">
                            <a class="nav-link active " aria-current="page" href="all_sem_select_subject.php" style="color: white;">Add Questions</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="show_question_all_sem.php" style="color: white;">Show Current Questions</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="sem/show_past_questions.php" style="color: white;">Show Past questions</a>
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


        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card for_card for_left_side_card">

                    <div class="card-body">
                        <h2 class="card-title center_all_semester_head">Semester 1</h2>
                        <div class="container">
                            <h5>Select Subject</h5>
                            <form action="sem/numberof_questionAndtime.php" method="post">
                            <select id="subjectSelect" class="form-select" name="subject" onchange="this.form.submit()">
                                <option value="0">--select--</option>
                                <option value="java">Core Java</option>
                                <option value="python">Python Programming</option>
                                <option value="dbms">Database Management System</option>
                                <option value="dms">Descrete Mathematics Structure</option>
                                <option value="cs">Communication Skills</option>
                            </select>
                            <input type="hidden" name="sem" value="1">
                            </form>
                            <div id="selectedSubject"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card for_card ">

                    <div class="card-body">
                        <h2 class="card-title center_all_semester_head">Semester 2</h2>
                        <div class="container">
                            <h5>Select Subject</h5>
                            <select id="subjectSelect" class="form-select">
                                <option value="">--select--</option>
                                <option value="PHP">PHP</option>
                                <option value="CN">CN</option>
                                <option value="HTML">HTML</option>
                                <option value="CS">CS</option>
                            </select>
                            <div id="selectedSubject"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card for_card for_left_side_card">

                    <div class="card-body">
                        <h2 class="card-title center_all_semester_head">Semester 3</h2>
                        <div class="container">
                            <h5>Select Subject</h5>
                            <select id="subjectSelect" class="form-select">
                                <option value="">--select--</option>
                                <option value="PHP">PHP</option>
                                <option value="CN">CN</option>
                                <option value="HTML">HTML</option>
                                <option value="CS">CS</option>
                            </select>
                            <div id="selectedSubject"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card for_card">

                    <div class="card-body">
                        <h2 class="card-title center_all_semester_head">Semester 4</h2>
                        <div class="container">
                            <h5>Select Subject</h5>
                            <select id="subjectSelect" class="form-select">
                                <option value="">--select--</option>
                                <option value="PHP">PHP</option>
                                <option value="CN">CN</option>
                                <option value="HTML">HTML</option>
                                <option value="CS">CS</option>
                            </select>
                            <div id="selectedSubject"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>