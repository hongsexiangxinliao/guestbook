<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板测试</title>
<link href="GuestbookIndex.css" rel="stylesheet" type="text/css" />
</head>
<link rel="stylesheet" href="../themes/default/default.css" />
	<link rel="stylesheet" href="../plugins/code/prettify.css" />
	<script charset="utf-8" src="../kindeditor.js"></script>
	<script charset="utf-8" src="../lang/zh_CN.js"></script>
	<script charset="utf-8" src="../plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="Content"]', {
				cssPath : '../plugins/code/prettify.css',
				uploadJson : '../php/upload_json.php',
				fileManagerJson : '../php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
		 editor.sync();
    //获取编辑器内容
    var content = editor.html();
    //替换JS块代码中的"<"和">"成"[["和"]]"
    content = content.replace(/&lt;/ig, "[[");
    content = content.replace(/&gt;/ig, "]]");
    //其他处理代码
	</script>
<body>
<div class="bold">留言板</div>
  <?php
//Create connection
 $con=mysqli_connect("localhost","root","","root");
 //Check Connection
 if (mysqli_connect_errno($con))
 {
	 echo "Failed to connect mysql database:" . mysqli_connect_error();
 }
 session_start();
 //Check if user has already login.
 if (empty($_SESSION['UID']))
 {
	 echo "您尚未登录！".'<a href="login.php">点此登陆</a>';
 }
 if (!empty($_SESSION['UID']))
 {
	 echo '<a href="logout.php">登出</a>';
	 //print submit form
	 echo 
	 '<form action="thread_response.php" method="post">
       留言内容：
      <textarea name="Content" cols="100" rows="10"></textarea>
  <input name="发表" type="submit" id="发表" value="发表">
';
 }
 //set up pages
$tid_num=1;
$sql_tid="select COUNT(*) from thread";
$get_tid=mysqli_query($con,$sql_tid);
$fetch_tid=mysqli_fetch_array($get_tid,MYSQLI_BOTH);
$rows_tid=$fetch_tid[0];
//calculate pages
$pages=intval($rows_tid/20);
if ($rows_tid%20!=0)
{
	++$pages;
}
if (isset($_GET['page']))
{
	 $page=intval($_GET['page']);
}
else
{
	$page=1;
}
//set offset
$offset=($page-1)*20;
//define page settings
$first=1;
$last=$pages;
$prev=$page-1;
$next=$page+1;
//page actions
echo '<br>';
if ($page>1)
{
	echo "<div align = 'center'><a href='index.php?page=".$first."'>首页</a>";
	echo "<a href='index.php?page=".$prev."'>上一页</a></div>";
}
if ($page<$pages)
{
	echo "<div align = 'center'><a href='index.php?page=".$next."'>下一页</a>";
	echo "<a href='index.php?page=".$last."'>末页</a></div>";
}
echo "<div align = 'center'>共有" .$pages. "页(" .$page. "/" .$pages.")";
for($i=1; $i<$page; $i++)
{
	echo "<a href='index.php?page=".$i."'>[".$i."]</a>";
}
echo "[" .$page. "]";
for($i=$page+1; $i<=$pages;$i++)
{
	echo "<a href='index.php?page=".$i."'>[".$i."]</a>";
}
echo"</div>";
//get everyting about thread
for ($tid_num=$offset;$tid_num<($page*20+1);++$tid_num)
{
$threadcontent="select Content from thread where Tid='$tid_num'";
$get_thread=mysqli_query($con,$threadcontent);
$thread=mysqli_fetch_array($get_thread,MYSQLI_BOTH);
$sql_threadUID="select UID from thread where Tid='$tid_num'";
$get_threadUID=mysqli_query($con,$sql_threadUID);
$threadUID_array=mysqli_fetch_array($get_threadUID,MYSQLI_BOTH);
//print if cannot load sql thread
if (!$threadcontent)
{
	echo "获取留言信息时出现错误";
}
if (!$get_thread)
{
	printf("ERROR:%s\n",mysqli_error($con));
}
//print_r($thread);
if (!$get_threadUID)
{
	printf("ERRPR:%s\n",mysqli_error($con));
}
//get userid
echo '<br>';
$threadUID=$threadUID_array['UID'];
$sql_UserID="select UserID from user where UID='$threadUID'";
$get_UserID=mysqli_query($con,$sql_UserID);
$UserID=mysqli_fetch_array($get_UserID,MYSQLI_BOTH);
//print thread form
if (!empty($thread['Content']))
{
	echo '<div class="thread_title">',"发布用户：",$UserID['UserID']," TID:",$tid_num,'</div>';
    echo '<div class="thread_content">',$thread['Content'],'</div>';
}

}
?>

 </body>
</html>