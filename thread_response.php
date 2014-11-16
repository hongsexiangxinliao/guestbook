<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板-发布留言</title>
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
 session_start();
 $UID=$_SESSION['UID'];
 if (!empty($_POST['Content']))
 {
	 if (get_magic_quotes_gpc())
	 {
		 $Content= stripslashes($_POST['Content']);
	 }
	 else
	 {
				 $Content=$_POST['Content'];
 
	 }
 }
 $sql="INSERT INTO thread (UID,Content) VALUES ($UID,'$Content')";
if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else
{
  echo "留言发布成功，将在三秒后返回首页。";
  //header("refresh:3;index.php");
  }
  if (!$sql)
{
	echo "留言发布失败！";
}
 ?>
<body>
</body>
</html>