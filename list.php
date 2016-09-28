<!DOCTYPE html>
<html>
<head>
  <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″>
  <title>查看学生列表</title>
</head>
<body>
<center>
  <?php include 'menu.php';?>
</center>
<hr class="hr">
<table border=1 class="tb" style="text-align: center;">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Sex</th>
    <th>Classid</th>
    <th>Operation</th>
  </tr>
<?php
header("Content-type: text/html;charset=utf-8");
try {
    $pdo = new PDO('mysql:host=localhost;dbname=test');
    $pdo->query('set names utf8;');
} catch (Exception $e) {
    die('connect database fail' . $e->getMessage());
}
$sql = 'select * from stu';
foreach ($pdo->query($sql) as $row) {
    echo "<tr>";
    echo "<td>{$row['Id']}</td>";
    echo "<td>{$row['Name']}</td>";
    echo "<td>{$row['Sex']}</td>";
    echo "<td>{$row['Classid']}</td>";
    echo "<td><a href='edit.php?id={$row['Id']}'>Modify</a><span style='padding-left:5px; padding-right:5px;'></span><a href='action.php?action=delete&local=list&id={$row['Id']}'>Delete</a></td>";
    echo "</tr>";
}
?>
</table>
</body>
</html>