<?php
session_start();
if (!$_SESSION['session_token']) {
    header("Location: http://127.0.0.1/php_student_information_manager_system/login.php");
} else {
    header("Location: http://127.0.0.1/php_student_information_manager_system/content.php");
}
?>
