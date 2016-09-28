<?php
header("Content-type:text/html;charset=utf-8");
$con=mysql_connect("localhost","root","root");
if(!$con)
{
	echo mysql_error();
}

mysql_select_db("login",$con);

//增加
$password=md5("123");
//$sql="insert into `login`(`user`,`password`)values('admin','$password')";
//删除
//$sql="delete from `login` where `id` = '2'";
//修改
//$sql="update `login` set `user`='username' where id='3'";
//查询
$sql="select `password` from `login` where `user`='admin'";
$set=mysql_query($sql);
$result=mysql_fetch_array($set);
//print_r($result);
echo $result['password'];
if($set == 1)
{
	echo "查询成功";
}
?>