<?php
    $enrollment = $_POST['enrollment'];
    $new_mail = $_POST['new_mail'];

    include "db_connection.php";

    $update_mail = "UPDATE enrollment SET mail_id = '$new_mail' WHERE enrollment = '$enrollment'";
    $result = mysqli_query($conn, $update_mail);
    echo "<script>
            alert('Mail Changed Successfully');
            window.location.href = 'show_students.php';
        </script>";

?>

