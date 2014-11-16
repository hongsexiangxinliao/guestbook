<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板-注册成功</title>
</head>
<?php require 'sqlin.php';?>
<?php
 //Create connection
 $con=mysqli_connect("localhost","root","","root");
 //Check Connection
 if (mysqli_connect_errno($con))
 {
	 echo "Failed to connect mysql database:" . mysqli_connect_error();
 }
 ?>
<?php

$Password=md5($_POST["PasswordOriginal"]);
$sql="INSERT INTO user (UserID,UserPassword,UserType)
VALUES
('htmlspecialchars($_POST[UserID])','$Password',0)";
if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else
{
  echo "用户创建成功，三秒后将以登录用户身份返回留言板主页。";
  $get_uid=mysqli_query($con,"SELECT UID FROM user WHERE UserID='$_POST[UserID]'");
  $UID=mysqli_fetch_array($get_uid);
    //var_dump(mysqli_fetch_array($get_uid));
  
  session_start();
  $_SESSION['UID']=$UID[0];
  header("refresh:3;index.php");
}
if (!$sql)
{
	echo "用户创建失败！";
}

?>
<body>
</body>
</html>