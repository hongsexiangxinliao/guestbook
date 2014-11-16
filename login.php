<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板-登陆</title>
</head>
<link href="GuestbookIndex.css" rel="stylesheet" type="text/css" />
</head>
<?php
 //Create connection
 $con=mysqli_connect("localhost","root","","root");
 //Check Connection
 if (mysqli_connect_errno($con))
 {
	 echo "Failed to connect mysql database:" . mysqli_connect_error();
 }
 ?>

<body>
<div class="bold">
<div class="title">登陆</div>
</div>
<form action="login_response.php" method="post">
<div class="inputname">
<p align="center">用户名:
  <input type="text" name="UserID">
  <div class="inputname">
</p>
<p align="center">密码:
  <input type="password" name="PasswordOriginal">
</p>
<p align="center">
  <input name="登陆" type="submit" id="登陆" value="登陆">
  <a href="register.php">还没有注册？</a>
<body>
</body>
</html>