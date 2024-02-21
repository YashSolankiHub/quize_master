<?php
    include "db_connection.php";

    $first = "select * from enrollment order by enrollment asc limit 1 ";
    $result_first = mysqli_query($conn, $first);

    $row_first = mysqli_fetch_assoc($result_first);

    // print_r($row_first);
    $min = $row_first['enrollment'];

    $last = "select * from enrollment order by enrollment desc limit 1 ";
    $result_last = mysqli_query($conn, $last);

    $row_last = mysqli_fetch_assoc($result_last);

    // print_r($row_last);
    $max = $row_last['enrollment'];


?>