<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板-登陆</title>
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
 <?php
 $Password=md5($_POST["PasswordOriginal"]);
 $UserID=htmlspecialchars($_POST["UserID"]);

 $sql="select UID from user where UserID='$UserID' and UserPassword='$Password'";
 
 $check_user=mysqli_query($con,$sql);
$UID=mysqli_fetch_array($check_user,MYSQLI_BOTH);
	 if(!empty($UID[0]))
	 {
	 session_start();
	 $_SESSION['UID']=$UID[0];
     echo "登陆成功，三秒后将以注册用户身份返回主页。";
	header("refresh:3;index.php");
	 }
	 else
	 {
		 echo "登陆失败";
	 }
 
 ?>
<body>
</body>
</html>