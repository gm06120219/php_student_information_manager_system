<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=test');
    $pdo->query('set names utf8;');
} catch (Exception $e) {
    die('connect database fail' . $e->getMessage());
}

switch ($_GET['action']) {
case 'add':
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $classid = $_POST['classid'];
    $sql = "insert into stu values(null, '{$name}', '{$sex}', '{$classid}')";
    $rw = $pdo->exec($sql);
    if ($rw > 0) {
        echo "<script>alert('Add Success'); window.location.replace('http://127.0.0.1/php_student_information_manager_system/list.php') </script>";
    } else {
        echo "<script>alert('Add Failure'); window.location.replace('http://127.0.0.1/php_student_information_manager_system/list.php') </script>";
    }
    break;

case 'login':
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == '' or $username == null or $password == '' or $password == null) {
        echo "<script>alert('username or password invalid'); window.location.replace('http://127.0.0.1/login.html')</script>";
    } else {
        if ($username == 'liguangming' and $password == '123456') {
            $_SESSION['session_token'] = $username;
            header("Location: http://127.0.0.1/php_student_information_manager_system/content.php");
        } else {
            header('local:127.0.0.1/php_student_information_manager_system/login.php');
        }
        // console.log()
        // echo "<script>alert('ok'); window.location.replace('http://127.0.0.1/index.php')</script>";
    }

    break;

case 'logout':
    session_start();
    // $_SESSION['session_token'] = null;
    // session_unset();
    unset($_SESSION['session_token']);
    echo '<a href="index.php">注销登录成功！跳转首页</a>';
    // session_destroy();
    break;

case 'delete':
    if ($_GET['local'] == 'list') {
        $id = $_GET['id'];
        $sql = "DELETE FROM `stu` WHERE `stu`.`Id` = '{$id}'";
        $rw = $pdo->exec($sql);
        if ($rw > 0) {
            // echo "<script>alert('Add Success'); windows.location='./index.php'</script>";
            echo "<script>alert('Delete Success'); window.location.replace('http://127.0.0.1/php_student_information_manager_system/list.php') </script>";
        } else {
            echo "<script>alert('Delete Failure'); window.location.replace('http://127.0.0.1/php_student_information_manager_system/list.php') </script>";
        }
        break;
    }

case 'edit':
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $classid = $_POST['classid'];
    $sql = "UPDATE `stu` SET `Name` = '" . $name
        . "' , `Sex` = '" . $sex
        . "' , `Classid` = '" . $classid
        . "' WHERE `stu`.`Id` = " . $_GET['id'];
    echo $sql;

    $rw = $pdo->exec($sql);
    if ($rw > 0) {
        echo "<script>alert('Modify Success'); window.location.replace('http://127.0.0.1/php_student_information_manager_system/list.php') </script>";
    } else {
        echo "<script>alert('Modify Failure'); window.location.replace('http://127.0.0.1/php_student_information_manager_system/list.php') </script>";
    }
    break;

case 'test':
    $error_respon = array('code' => 'ERROR_MSG_MISS', 'msg' => '消息不存在');
    echo json_encode($error_respon);
    break;
default:

    break;
}

?>