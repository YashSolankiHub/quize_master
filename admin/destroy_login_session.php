<?php

    session_start();
    session_unset();
    session_destroy();

    echo "<script>
    window.location.href = 'login_page.php';
        </script>";


?>



