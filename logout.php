<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板-注销登陆</title>
</head>
<?php
session_start();
session_destroy();

	echo "您已成功登出";
	header("refresh:3;index.php");
?>
<body>
</body>
</html>