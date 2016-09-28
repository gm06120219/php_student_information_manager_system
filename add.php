<!DOCTYPE html>
<html>
<head>
  <title>添加学生信息</title>
</head>
<body>
<center>
  <?php include 'menu.php';?>
</center>
<hr class="hr">
<form action="action.php?action=add" method="post">
<table class="tb">
<tr>
  <td>Name</td>
  <td>
    <input type="text" name="name" />
  </td>
</tr>
<tr>
  <td>Sex</td>
  <td>
    <input type="radio" name="sex" value="m" />Man
    <input type="radio" name="sex" value="w" />Waman
  </td>
</tr>
<tr>
  <td>Classid</td>
  <td>
    <input type="text" name="classid" />
  </td>
</tr>
<tr>
  <td>Opearation</td>
  <td>
    <input type="submit" value="Add" />
    <input type="reset" value="Reset" />
  </td>
</tr>
</table>
</form>
</body>
</html>