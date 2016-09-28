<!DOCTYPE html>
<html>
<head>
  <title>修改学生信息</title>
</head>
<body>
<center>
  <?php include 'menu.php';?>
</center>
<hr class="hr">

    <?php
header("Content-type: text/html;charset=utf-8");
try {
    $pdo = new PDO('mysql:host=localhost;dbname=test');
    $pdo->query('set names utf8;');
} catch (Exception $e) {
    die('connect database fail' . $e->getMessage());
}
$sql = 'select * from stu where Id = ' . $_GET['id'];
$result = $pdo->query($sql)->fetchAll();

if (count($result) == 1) {
    echo "<form action=\"action.php?action=edit&id={$_GET['id']}\" method=\"post\">";
    echo "<table class=\"tb\">";
    echo "<tr>";
    echo "<td>Name</td>";
    echo "<td><input type=\"text\" name=\"name\" value='{$result[0]['Name']}'/></td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Sex</td>";
    if ($result[0]['Sex'] == 'w') {
        echo "<td>
                    <input type=\"radio\" name=\"sex\" value=\"m\" />Man
                    <input type=\"radio\" name=\"sex\" value=\"w\" checked=\"checked\"/>Waman
                  </td>";
    } else {
        echo "<td>
                    <input type=\"radio\" name=\"sex\" value=\"m\" checked=\"checked\"/>Man
                    <input type=\"radio\" name=\"sex\" value=\"w\" />Waman
                  </td>";
    }
    echo "<tr>";
    echo "<td>Classid</td>";
    echo "<td>
                    <input type=\"text\" name=\"classid\" value='{$result[0]['Classid']}'/>
                    </td>";
    echo "<tr>";
    echo "</tr>";

    echo "<tr>
                  <td>Opearation</td>
                  <td>
                    <input type=\"submit\" value=\"Save\" />
                    <input type=\"reset\" value=\"Cancel\" />
                  </td>
                </tr>";

}
?>

  </table>
</form>
</body>
</html>