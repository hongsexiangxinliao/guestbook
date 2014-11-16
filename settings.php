<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Settings</title>
</head>
<?php
 //Start Connection
 $con=mysqli_connect("localhost","root","","root");
 //Check Connection
 if (mysqli_connect_errno($con))
 {
	 echo "Failed to connect mysql database:" . mysqli_connect_error();
 }
 //Create Table User
 $sql="CREATE TABLE UserNums(Total INT)";
 //Execute query
 if (mysqli_query($con,$sql))
 {
	 echo "Table UserNums created Successfully";
 }
 else
 {
	 echo "Table UserNums Created Error.";
 }
?>
<body>
</body>
</html>