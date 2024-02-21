<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>404 Error - Page Not Found</title>
<link rel="icon" href="logo/qm.png" type="image/x-icon">
<link rel="stylesheet" href="style/404_error.css">
<style>
    
</style>
</head>
<body>
<div class="container">
    <div>
        <h1 class="error-message">404</h1>
        <p class="error-description">Sorry, the page you are looking for could not be found.</p>
        <a href="login_page.php" class="button">Go to Login Page</a>
    </div>
</div>
</body>
</html>


<td class="font-size-td"><?php echo $row['sr_no'] ?> </td>
                            <td class="font-size-td"><?php echo $row['enrollment'] ?> </td>
                            <td class="font-size-td"><?php echo $row['student_name'] ?> </td>
                            <td class="font-size-td"><?php echo $row['mail_id'] ?> </td>
                            <td><button class="change_mail-button">Change Mail</button></td>
                            <td><button class="resend_mail-button">Resend Mail</button></td>
                            <td><button class="profile-button">Profile</button></td>
