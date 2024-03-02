<?php 
include "db_connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enrollment = $_POST['enrollment'];
}

$select_name  = "SELECT student_name from enrollment WHERE enrollment = '$enrollment'";
$result = $conn->query($select_name);
$row = mysqli_fetch_assoc($result);
$student_name = $row['student_name'];


$select = "SELECT *FROM result WHERE enrollment = '$enrollment'";
$execute = $conn->query($select);
$num = mysqli_num_rows($execute);




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Students</title>
    <link rel="icon" href="logo/qm.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <style>
        body{
            background-image: url("img/back.png");
            background-size: cover;
        }
    </style>
</head>
<body>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 120%;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $student_name; ?></h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p><b>Enrollment: <?php echo $enrollment; ?></b></p>
                    <table class="table">

                        <?php
                        if ($num >= 1) { ?>
                            <thead>
                                <tr>

                                    <th scope="col" class="ctr">Given exam</th>
                                    <th scope="col" class="ctr">Semester</th>
                                    <th scope="col" class="ctr">Percentage</th>
                                    <th scope="col" class="ctr">Result</th>
                                    <th scope="col" class="ctr">Date</th>
                                    <th scope="col" class="ctr">Certificate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($line = mysqli_fetch_assoc($execute)) { ?>
                                    <tr>
                                        <td class="ctr"><?php echo $line['subject']; ?></td>
                                        <td class="ctr"><?php echo $line['semester']; ?></td>
                                        <td class="ctr"><?php echo $line['percentage'] . "%"; ?></td>
                                        <td class="ctr"><?php echo $line['result_status']; ?></td>
                                        <td class="ctr"><?php echo $line['date']; ?></td>
                                        <?php
                                        if ($line['subject'] == 'java') {
                                            $subject_code = "23MCA101";
                                        } elseif ($line['subject'] == 'python') {
                                            $subject_code = "23MCA102";
                                        } elseif ($line['subject'] == 'dbms') {
                                            $subject_code = "23MCA103";
                                        } elseif ($line['subject'] == 'dms') {
                                            $subject_code = "23MCA104";
                                        } elseif ($line['subject'] == 'cs') {
                                            $subject_code = "23MCA105";
                                        }

                                        $certificate_url = "certificates/" . $enrollment . "_" . $subject_code . ".jpg";

                                        ?>
                                        <?php
                                        if ($line['percentage'] >= 80) { ?>
                                            <td class="ctr"><button class="btn btn-warning" download="" style="width: 90px;
                                            height: 25px;padding: 0;color: white;background-color:rgb(47, 79, 79);border:none;">
                                                    <a href="<?php echo $certificate_url; ?>" style="color:white;text-decoration:none;" download="">Download</a>
                                                </button></td>


                                        <?php } else { ?>
                                            <td class="ctr"><button class="btn btn-warning" download="" style="width: 90px;
                                            height: 25px;padding: 0;color: white;background-color:rgb(47, 79, 79);border:none;" disabled>
                                                    <a href="#" style="color:white;text-decoration:none;">Download</a>
                                                </button></td>
                                        <?php } ?>

                                    </tr>
                                <?php }
                            } else { ?>
                                <p style="text-align: center;">No results found!</p>
                            <?php  } ?>
                            </tbody>
                    </table>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                <a class="btn btn-secondary" href="show_students.php">Close</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {})
    myModal.show()
    </script>
    
</body>
</html>