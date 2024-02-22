<?php


include "limit_enrollment.php"; //also contain connection code

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$sql = "select *from enrollment";
$result = mysqli_query($conn, $sql);
$num = false;


$total_student_query = "select count(*)as total_student from enrollment ";
$r = mysqli_query($conn, $total_student_query);
$row_total_student = mysqli_fetch_assoc($r);
$total_student = $row_total_student['total_student'];
// echo $total_student;

$enrollment_from_show_students = $_POST['enrollment_for_modal'];
$mail_from_show_students = $_POST['mail_for_modal'];

// echo $enrollment_from_show_students;




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
</head>
</head>
<link rel="stylesheet" href="style/home_page.css">
<style>
    .search_input_width {
        width: 25%;
    }

    .search-button {
        background: none;
        border: none;
    }

    .table-width {
        width: 80%;

    }

    .font-size-th {
        font-size: 15px;
    }

    .font-size-td {
        font-size: 13px;
    }

    .change_mail-button {
        /* background-color: rgb(47, 79, 79); */
        color: rgb(47, 79, 79);
        border: 1px solid rgb(47, 79, 79);
        ;
        border-radius: 5px;
        cursor: pointer;
        transition: filter 0.3s ease;
        height: 26px;
        padding: 0;
        width: 90px;
        font-size: 13px;
    }


    /* Hover effect */
    .change_mail-button:hover {
        /* filter: brightness(1.2); */
        background-color: orange;
        color: white;
    }

    .resend_mail-button {
        /* background-color: rgb(47, 79, 79); */
        color: rgb(47, 79, 79);
        border: 1px solid rgb(47, 79, 79);
        ;
        border-radius: 5px;
        cursor: pointer;
        transition: filter 0.3s ease;
        height: 26px;
        padding: 0;
        width: 90px;
        font-size: 13px;

    }


    /* Hover effect */
    .resend_mail-button:hover {
        /* filter: brightness(1.2); */
        background-color: rgb(187, 45, 59);
        color: white;
    }

    .profile-button {
        /* background-color: rgb(47, 79, 79); */
        color: rgb(47, 79, 79);
        border: 1px solid rgb(47, 79, 79);
        ;
        border-radius: 5px;
        cursor: pointer;
        transition: filter 0.3s ease;
        height: 26px;
        padding: 0;
        width: 90px;
        font-size: 13px;
    }


    /* Hover effect */
    .profile-button:hover {
        /* filter: brightness(1.2); */
        background-color: rgb(21, 115, 71);
        color: white;
    }

    .btn-save {
        background-color: rgb(47, 79, 79);
        color: white;
    }

    .btn-save:hover {
        background-color: rgb(40, 70, 75);
        color: white;
    }
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
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="home_page.php" style="color: white;">Home</a>
                        </li>
                        <li class="nav-item" style="border:1px solid white;border-radius:15px">
                            <a class="nav-link active " aria-current="page" href="show_students.php" style="color: white;">Students</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">
                        <button type="button" class="btn btn-light" style="margin-right: 27px;" onclick="home()">Logout</button>
                    </form>
                    <script>
                        function home() {

                            window.location.href = "destroy_login_session.php";

                        }
                    </script>
                </div>
            </div>
        </nav>

        </section>
        <section class="d-flex justify-content-center">


        </section>

        <section class="d-flex justify-content-center">

            <table class="table table-width">

                <tbody>
                    <tr>
                        <td style="background-color: rgb(247, 247, 247);border:none;font-size: 15px;">TOTAL STUDENT</td>
                        <td style="background-color: rgb(247, 247, 247);border:none;font-size: 15px;"><?php echo $total_student; ?></td>
                        <td style="background-color: rgb(247, 247, 247);border:none"></td>
                        <td style="background-color: rgb(247, 247, 247);border:none"></td>
                        <td colspan="3" style="background-color: rgb(247, 247, 247);border:none;">
                            <form action="show_students.php" method="post" class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Search Enrollment" name="enrollment" min="<?php echo $min; ?>" max="<?php echo $max; ?> " required>
                                <span class="input-group-text" id="basic-addon2"><button class="search-button">Search</button></span>
                            </form>
                        </td>


                    </tr>
                    <tr style="border-bottom: 1px solid rgb(47, 79, 79);">
                        <td style="background-color: rgb(247, 247, 247) ;color: rgb(47, 79, 79);" class="font-size-th">SR.NO</td>
                        <td style="background-color: rgb(247, 247, 247) ;color: rgb(47, 79, 79);" class="font-size-th">ENROLLMENT</td>
                        <td style="background-color: rgb(247, 247, 247) ;color: rgb(47, 79, 79);" class="font-size-th">NAME</td>
                        <td style="background-color: rgb(247, 247, 247) ;color: rgb(47, 79, 79);" class="font-size-th">MAIL ID</td>
                        <td style="background-color: rgb(247, 247, 247) ;color: rgb(47, 79, 79);" class="font-size-th">CHANGE MAIL</td>
                        <td style="background-color: rgb(247, 247, 247) ;color: rgb(47, 79, 79);" class="font-size-th">PASSWORD</td>
                        <td style="background-color: rgb(247, 247, 247) ;color: rgb(47, 79, 79);" class="font-size-th">PROFILE</td>
                    </tr>
                    <?php


                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td class="font-size-td"><?php echo $row['sr_no'] ?> </td>
                            <td class="font-size-td"><?php echo $row['enrollment'] ?> </td>
                            <td class="font-size-td"><?php echo $row['student_name'] ?> </td>
                            <td class="font-size-td"><?php echo $row['mail_id'] ?> </td>
                            <td style="text-align: center;">
                                <form action="modal_show_students.php"><button type="submit" class="change_mail-button" >
                                        Change
                                    </button></form>
                            </td>
                            <td style="text-align: center;"><button class="resend_mail-button">Send</button></td>
                            <td><button class="profile-button">Profile</button></td>
                        </tr>
                    <?php }
                    ?>





                </tbody>
            </table>


        </section>
        <!-- Page Loaded Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Mail Id</h5>
                    </div>
                    <div class="modal-body">
                        <form action="change_mail.php" method="post">
                            <input type="text" class="form-control" name="" placeholder="Enrollment : <?php echo $enrollment_from_show_students; ?> " name="modal_enrollment" required disabled>
                            <input type="hidden" name="enrollment" value="<?php echo $enrollment_from_show_students; ?>">
                            <br>
                            <input type="text" class="form-control"  placeholder="Current Mail Id : <?php echo $mail_from_show_students; ?> " name="modal_enrollment" required disabled>
                            <br>
                            <input type="email" class="form-control" placeholder="Enter New Mail ID" name="new_mail" required>
                        
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" href="show_students.php">Close</a>
                        <button type="submit" class="btn btn-save">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function back() {
                window.location.href = 'show_students.php';
            }

            var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
            myModal.show()
        </script>
</body>

</html>