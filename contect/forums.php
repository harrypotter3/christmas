<?php
    session_start();
    header("Content-type:text/html;charset=utf-8");    //设置编码
    $page=isset($_GET['page']) ?$_GET['page'] :1 ;//接收页码
    $page=!empty($page) ? $page :1;
    $F=$_GET['F'];
    // 创建连接
    $conn = mysqli_connect("localhost", "root", "root", "mybbs");
    mysqli_set_charset($conn,'utf8'); //设定字符集
    $table_name="tiopic";//查取表名设置
    $perpage=5;//每页显示的数据个数
    //最大页数和总记录数
    $total_sql="select count(*) from $table_name";
    $total_result =mysqli_query($conn,$total_sql);
    $total_row=mysqli_fetch_row($total_result);
    $total = $total_row[0];//获取最大页码数
    $total_page = ceil($total/$perpage);//向上整数
    //临界点
    $page=$page>$total_page ? $total_page:$page;//当下一页数大于最大页数时的情况
    //分页设置初始化
    $start=($page-1)*$perpage;
    $sql="select * from tiopic order by id desc limit $start ,$perpage";
    $que=mysqli_query($conn,$sql);
    $sum=mysqli_num_rows($que);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>帖子</title>
    <style>
         body{
            background-image: url(image/bc.jpg);
            background-size: cover;

        }
        table{
            background-color: white;
            position: relative;
            top: 100px;
            width: 60%;
            
        }
        .cen{
            border: none;
            width: 600px;
            margin: 0 auto;
            height: 40px;
            background-color: rgba(34, 35, 62, 0.08);
        }
        .left{
            width: 535px;
            float: left;
        }
        .right{
            width: 65px;
            height: 30px;
            background-color:#B10707 ;
            float: left;
            margin-top: 8px;
        }
        .title{
            background-image: url(image/nav.png);

            background-size: cover;
            width: 100%;
            height: 100px;
            font-size: 17px;
            color: white;
        }
        .list{
            margin-left: 12px;
        }
    </style>
</head>
<body>
<div class="cen">
<div class="left">
  <?php
 $sql1="select forum_name from forums where id='$F'";
 $squ1=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_array($squ1);
 $forum_name=$row['forum_name'];
 echo "当前论坛为：<a href=\"index.php\">$gb_name</a>-->>$forum_name";
 ?>
</div>
<div class="right"><a style="color: white" href="addnew.php">发布新帖</a> </div>
</div>
<table width="600px" border="1" cellpadding="8" cellspacing="0" align="center">
    <tr class="title">
        <td colspan="3">帖子列表 <span class="list">[<a style="color: white" href="index.php">返回</a> ]</span></td>
    </tr>
    <tr>
        <td width="280px">主题列表</td>
        <td width="160px" >作者</td>
        <td width="160px">最后更新</td>
    </tr>
    <?php
    if($sum>0) {
 while($row=mysqli_fetch_array($que)) {
 ?>
 <tr>
        <td width="280px"><div><a href="thread.php?id=<?php echo $row['id']?>"</a><?php echo $row['title']?></div> </td>
        <td width="160px"><?php echo $row['author'] ?></td>
        <td width="160px"><?php echo $row['last_post_time']?></td>
    </tr>
            <tr>
                <td colspan="3">
                    <?php }
                   }
 else{
 echo "<tr><td colspan='5'>本版块没有帖子.....</td></tr>";
                    } ?>
 </td>
            </tr>
    <tr>
        <td colspan="5">
            <div id="baner" style="margin-top: 20px">
                <a href="<?php
                echo "$_SERVER[PHP_SELF]?page=1"
 ?>">首页</a>
                  <a href="<?php
                echo "$_SERVER[PHP_SELF]?page=".($page-1)
 ?>">上一页</a>
                <!--        显示123456等页码按钮-->
 <?php
                for($i=1;$i<=$total_page;$i++){
 if($i==$page){//当前页为显示页时加背景颜色
 echo "<a  style='padding: 5px 5px;background: #000;color: #FFF' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>";
                    }else{
 echo "<a  style='padding: 5px 5px' href='$_SERVER[PHP_SELF]?page=$i'>$i</a>";
                    }
                }
 ?>
   <a href="<?php
                echo "$_SERVER[PHP_SELF]?page=".($page+1)
 ?>">下一页</a>
                  <a href="<?php
                echo "$_SERVER[PHP_SELF]?page={$total_page}"
 ?>">末页</a>
                  <span>共<?php echo $total?>条</span>
            </div>
        </td>
    </tr>
</table>
</body>
</html>