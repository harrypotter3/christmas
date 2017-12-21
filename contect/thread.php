<?php
header("Content-type:text/html;charset=utf-8"); //设置编码
// 创建连接
$conn = mysqli_connect("localhost", "root", "root", "mybbs");
mysqli_set_charset($conn,'utf8'); //设定字符集
$id=$_GET['id'];
$sql="select * from tiopic where id='$id'";
$que=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($que);
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>详情</title>
 <style>
 		body{
            background-image: url(image/bc.jpg);
            background-size: cover;

        }
        table{
            background-color: white;
            position: relative;
            top: 200px;
            width: 60%;
           
            
        }
        
	 .left{
	 width: 170px;
	 }
	 .bg{
		background-image: url(image/nav.png);

            background-size: cover;
            width: 100%;
            height: 100px;
            font-size: 17px;
            color: white;
	 }
	 .fh{
	 margin-left: 18px;
	 }
	 .spa{
	 margin-left: 25px;
	 }
	 .ind{
	 text-indent:2em;
	 }
 </style>
</head>
<body>
	<table width="400px" border="1" cellpadding="12" cellspacing="0" align="center">
	 <tr class="title"> 
	 	<td colspan="2" class="bg"><?php echo $row['title'] ?>
	 	<span class="fh"><a style="color: white" href="forums.php">[返回]</a></span>
	 	</td>
	 </tr>
	 	<tr>
		 	<td rowspan="2" class="left">
				 发帖人：
				 <?php
				 	echo $row['author']
				 ?>
		 	</td>
		 	<td>
				 发帖时间：<?php echo $row['last_post_time']?>
				 <span class="spa"><a href="reply.php?id=<?php echo$row['id']?>">回复</a></span>
		 	</td>
		 </tr>
		 <tr class="ind">
		 	<td><?php echo $row['content']?></td>
		 </tr>
			 <?php
			 if($row['reply']==""){
			 	echo "<tr>
			 	<td colspan='2'>暂时还没有回复哦！！！</td>
			 	</tr>";
			 }else{
				 echo "<tr>
				 <td>回复人:".$row['reply_author']. ".".$row['reply_time']."</td>
				 <td>".$row['reply']."</td>
				 </tr>";
			 }
			 ?>
	</table>
</body>
</html>