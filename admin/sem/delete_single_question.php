<?php
session_start();
    include "../db_connection.php";
    $sr_no = $_GET['no'];
    $sem = $_GET['sem'];
    $subject = $_GET['subject'];

    if($sem == 1)
        {
            if($subject == 'java')
                {
                    $delete_single_query = "DELETE FROM sem1_java WHERE sr_no = $sr_no";
                    $conn->query($delete_single_query);
                    $_SESSION['sem'] = $sem;
                    $_SESSION['subject'] = $subject;
                    echo "<script>
                    window.location.href = 'show_question_page.php';
                    </script>";
                }
            elseif($subject == 'python')
            {
                $delete_single_query = "DELETE FROM sem1_python WHERE sr_no = $sr_no";
                $conn->query($delete_single_query);
                $_SESSION['sem'] = $sem;
                $_SESSION['subject'] = $subject;
                echo "<script>
                window.location.href = 'show_question_page.php';
                </script>";
            }
            elseif($subject == 'dbms')
            {
                $delete_single_query = "DELETE FROM sem1_dbms WHERE sr_no = $sr_no";
                $conn->query($delete_single_query);
                $_SESSION['sem'] = $sem;
                $_SESSION['subject'] = $subject;
                echo "<script>
                window.location.href = 'show_question_page.php';
                </script>";
            }
            elseif($subject == 'dms')
            {
                $delete_single_query = "DELETE FROM sem1_dms WHERE sr_no = $sr_no";
                $conn->query($delete_single_query);
                $_SESSION['sem'] = $sem;
                $_SESSION['subject'] = $subject;
                echo "<script>
                window.location.href = 'show_question_page.php';
                </script>";
            }
            elseif($subject == 'cs')
            {
                $delete_single_query = "DELETE FROM sem1_cs WHERE sr_no = $sr_no";
                $conn->query($delete_single_query);
                $_SESSION['sem'] = $sem;
                $_SESSION['subject'] = $subject;
                echo "<script>
                window.location.href = 'show_question_page.php';
                </script>";
            }

            
        }

?>

