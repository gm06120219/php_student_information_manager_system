<?php
session_start();
if (!$_SESSION['session_token']) {
    header("Location: http://127.0.0.1/php_student_information_manager_system/login.php");
} else {
    $url = './content_static.php';
    include_once $url;
}
