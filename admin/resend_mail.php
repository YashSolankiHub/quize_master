<?php
include "db_connection.php";
$enrollment = $_POST['enrollment'];
$mail = $_POST['mail'];
// echo $mail;
// echo "<br>";
// echo $enrollment;
// echo "<br>";

$characters = $mail . $enrollment;
$password = '';
$length = 8;
for ($i = 0; $i < $length; $i++) {
    $password .= $characters[rand(0, strlen($characters) - 1)];
}
// echo $password;
$md_pass = md5($password);
$sql1 = "update enrollment set password = '$md_pass' where enrollment= '$enrollment'";
$result1 = mysqli_query($conn, $sql1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

    if (isset($_POST["resend"])) {
    $remail = new PHPMailer(true);

    $remail->isSMTP();
    $remail->Host = 'smtp.gmail.com';
    $remail->SMTPAuth = true;
    $remail->Username = 'notprimary9@gmail.com';
    $remail->Password = 'pyifecuecsuqtyzr';
    $remail->SMTPSecure = 'ssl';
    $remail->Port = 465;
    $remail->setFrom('notprimary9@gmail.com');
    $remail->addAddress("$mail");
    $remail->isHTML(true);
    $remail->Subject = 'QuizeMaster';
    $remail->Body = "Password : " . "<b>$password</b>";
    $remail->send();
    $hidden_mail = substr_replace($mail, str_repeat('*', strpos($mail, '@') - 3), 3, strpos($mmail, '@') - 3);
}

?>

<script>
    alert("Password sent successfully to <?php echo $hidden_mail; ?> Check your mail");
    document.location.href = 'show_students.php';
</script>