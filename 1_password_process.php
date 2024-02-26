<?php



$servername = "localhost";
$username = "root";
$ps = "";
$database = "quize_master";

$conn = mysqli_connect($servername, $username, $ps, $database);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function customErrorHandler($errno, $errstr, $errfile, $errline)
{
    // Check if the error level is among those you want to convert into exceptions
    if (error_reporting() === 0 || !in_array($errno, [E_WARNING, E_NOTICE])) {
        return;
    }

    // Throw an exception
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}

// Set custom error handler
set_error_handler('customErrorHandler');

try {
    // Trigger a PHP warning
    $enrollment = $_POST['enrollment'];
} catch (ErrorException $e) {
    // Catch the exception
    echo "<script>
        window.location.href ='404_error.php';
            </script>";
}

$sql1 = "select enrollment from generated_password where enrollment = '$enrollment' ";
$result1 = mysqli_query($conn, $sql1);
$num1 = mysqli_num_rows($result1);

if ($num1) {
    echo "<script>
            alert('Already sent mail! Please check your mail');
            document.location.href= 'login_page.php';
            </script>";
}


$sql = "select mail_id from enrollment where enrollment = '$enrollment'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

if (!$num) {
    echo "<script>
    alert('Enrollment number not valid!');
    document.location.href = '1_know_password.php';
    </script>";
} else {
    $row = mysqli_fetch_assoc($result);
    $email = $row['mail_id'];
    $characters = $email . $enrollment;
    $password = '';
    $length = 8;
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }


    // echo $password;
    // echo "<br>";
    // echo md5($password);
    $md_pass = md5($password);
    $sql = "insert into generated_password(enrollment, email, password) values ('$enrollment', '$email', '$md_pass')";
    $result = mysqli_query($conn, $sql);

    $sql1 = "update enrollment set password = '$md_pass' where enrollment= '$enrollment'";
    $result1 = mysqli_query($conn, $sql1);




    if (isset($_POST["send"])) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'quizemaster.mca@gmail.com';

        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->addAddress("$email");
        $mail->isHTML(true);
        $mail->Subject = 'QuizeMaster';
        $mail->Body = "Password : " . "<b>$password</b>";
        $mail->send();
    }
    $hidden_mail = substr_replace($email, str_repeat('*', strpos($email, '@') - 3), 3, strpos($email, '@') - 3);
    echo "<script>
    alert('Password sent successfully to $hidden_mail Check your mail');
    document.location.href = 'login_page.php';
    </script>";
}
