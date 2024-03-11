<?php 
include "../db_connection.php";

$select = "SELECT *FROM questions_history";
$result = $conn->query($select);
$num = mysqli_num_rows($result);

if ($num == 0) {
    echo "<script>
            alert('No past questions available!');
            window.location.href = '../home_page.php';
            </script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Past Questions</title>
    <link rel="icon" href="../logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/home_page.css">
    <style>
        .li-hover:hover{
            background-color: rgb(247, 247, 247);
            color: black;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary"  style="margin-top: -8px;">
            <div class="container-fluid color_for_container-fluid">

                <a class="navbar-brand color_for_nav_text" href="#">QuizMaster</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="home_page.php" style="color: white;">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="../show_students.php" style="color: white;">Students</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="../all_sem_select_subject.php" style="color: white;">Add Questions</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="../show_question_all_sem.php" style="color: white;">Show Current Questions</a>
                        </li>
                        <li class="nav-item " style="border:1px solid white;border-radius:15px">
                            <a class="nav-link active " aria-current="page" href="show_past_questions.php" style="color: white;">Show Past questions</a>
                        </li>
                        

                    </ul>
                    <form class="d-flex" role="search">
                        <button type="button" class="btn btn-light"  onclick="home()" style="margin-right: 26px;">Logout</button>
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

    <section>
    <table class="table" id=1>
  <thead>
    <tr>
      <th scope="col">Exam ID</th>
      <th scope="col">Title</th>
      <th scope="col">Question</th>
      <th scope="col">Option 1</th>
      <th scope="col">Option 2</th>
      <th scope="col">Option 3</th>
      <th scope="col">Option 4</th>
      <th scope="col">Answer</th>
      <th scope="col">Semeter</th>
      <th scope="col">Subject</th>
      <th scope="col">Subject Code</th>
      <th scope="col">Time Limit</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td> <?php echo $row['exam_id']; ?> </td>
            <td> <?php echo $row['question_title']; ?> </td>
            <td> <?php echo $row['question']; ?> </td>
            <td> <?php echo $row['option1']; ?> </td>
            <td> <?php echo $row['option2']; ?> </td>
            <td> <?php echo $row['option3']; ?> </td>
            <td> <?php echo $row['option4']; ?> </td>
            <td> <?php echo $row['answer']; ?> </td>
            <td> <?php echo $row['semester']; ?> </td>
            <td> <?php echo $row['subject']; ?> </td>
            <td> <?php echo $row['subject_code']; ?> </td>
            <td> <?php echo $row['time_minutes']; ?> </td>
            <td> <?php echo $row['date']; ?> </td>
        </tr>
    
   <?php }?>
  </tbody>
</table>
    </section>
    
    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
  <script>
    let table = new DataTable('#1');
  </script>
</body>

</html>