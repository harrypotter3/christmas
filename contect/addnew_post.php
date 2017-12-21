<?php 
	header("Content-type:text/html;charset=utf-8");    //设置编码
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mybbs";
	// 创建连接
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,'utf8');
	$author=$_POST['author'];
	$title=$_POST['content'];
	$last_post_time=date("Y-m-d H:i:s");
	$sql="insert into tiopic(author,title,content,last_post_time) values('$author','$title','$content','$last_post_time')";
	$que=mysqli_query($conn,$sql);
	if ($que) {
		echo "<script>alert('success!');location.href='forums.php';</script>";
	}else
	{
		echo "<script>alert('有点小问题..');location.href='addnew.php';</script>";
	}
 ?>