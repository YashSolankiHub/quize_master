<?php
include "db_connection.php";

$sem = $_POST['sem'];
$subject = $_POST['subject'];
$student_name = $_POST['student_name'];
$enrollment = $_POST['enrollment'];
$percentage = $_POST['percentage'];


if ($subject == 'java') {
    $subject_fullname = "Core Java";
    $subject_code = "23MCA101";
} elseif ($subject == 'python') {
    $subject_fullname = "Python Programming";
    $subject_code = "23MCA102";
} elseif ($subject == 'dbms') {
    $subject_fullname ="Database Management System";
    $subject_code = "23MCA103";
} elseif ($subject == 'dms') {
    $subject_fullname = "Descrete Mathematics Structure";
    $subject_code = "23MCA104";
} elseif ($subject == 'cs') {
    $subject_fullname = "Communication Skills";
    $subject_code = "23MCA105";
}


if ($percentage >= 80) {
    date_default_timezone_set("Asia/Calcutta");
    $date =  date("d/m/Y");
    $image = imagecreatefromjpeg("certificates/template.jpg");
    $font = "fonts/Gloock-Regular.ttf";
    $imageWidth = imagesx($image);
    $textBoundingBox = imagettfbbox(25, 0, $font, $subject);
    $textWidth = $textBoundingBox[2] - $textBoundingBox[0];

    $x = ($imageWidth - $textWidth) / 2;

    $color = imagecolorallocate($image, 0, 74, 173);
    $subject_color = imagecolorallocate($image, 0, 0, 0);
    imagettftext($image, 30, 0, 720, 540, $color, $font, $student_name);
    imagettftext($image, 30, 0, 770, 879, $color, $font, $enrollment);
    imagettftext($image, 30, 0, 1425, 879, $color, $font, $percentage."%");
    imagettftext($image, 28, 0, 1390, 1078, $color, $font, $date);
    imagettftext($image, 35, 0, $x, 735, $subject_color, $font, $subject_fullname);

    imagejpeg($image, "certificates/" . $enrollment."_".$subject_code . ".jpg");

    $url = "certificates/" . $enrollment."_".$subject_code . ".jpg";

    // header('Content-Type:image/jpeg');
    // imagejpeg($image);

    imagedestroy($image);

    $sql = "INSERT INTO certificate (enrollment, subject_code, url, enrollment_number) VALUE ('$enrollment', '$subject_code','$url', '$enrollment')";
    $result = $conn->query($sql);



    $_SESSION['enrollment'] = $enrollment;
    echo "<script>
    alert('Congratulations...Your certificate of $subject_fullname generated You can download it from your profile');
    window.location.href = 'home_page.php';
    </script>";
    




}

?>




</body>

</html>