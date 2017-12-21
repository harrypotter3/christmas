<?php
header("Content-type:text/html;charset=utf-8");    //设置编码
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mybbs";
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8'); //设定字符集
$sql="select * from forums";
$que=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($que)){
    echo "论坛 :".$row['forum_name'];
}
?>