<?php
session_start();
header("content-type:text/html;charset=utf8");
if(empty($_SESSION['username']))
{
 echo "<script>alert('请先登录');location.href='login.html';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>论坛</title>
    <style>

        body{
            background-image: url(image/bc.jpg);
            background-size: cover;

        }
        table{
            background-color: white;
            position: relative;
            top: 200px;
            width: 50%;
           
            
        }
        table,td,tr{
            /*border: 1px solid #B10707;*/
            border-radius: 5px;
        }
        .btn{
            background-color: #B10707;
            width: 90px;
            height: 40px;
            font-size: 15px;
            color: white;
            border: none;
        }
        #title{
            background-image: url(image/nav.png);

            background-size: cover;
            width: 100%;
            height: 100px;
            font-size: 17px;
            color: white;
        }
        .input{
            border: 1px solid red;
            width: 200px;
            height: 20px;
        }
        a{
            color: White;
        }
        .right{
            margin-left: 10px;
        }
    </style>
</head>
<body>
<form action="save_forum.php" method="post">
    <table width="450px" cellspacing="0" cellpadding="8" align="center">
        <tr  id="title">
            <td colspan="2">
                   论坛管理 <span class="right">[<a href="index.php">返回首页</a> ]</span>
            </td>
        </tr>
        <tr>
            <td width="23%"><strong>论坛名称</strong></td>
            <td width="97%"><input name="forum_name" type="text" class="input"></td>
        </tr>
        <tr>
            <td width="23%"><strong>论坛主题</strong></td>
            <td width="97%"><input name="Subject" type="text"  class="input"></td>
        </tr>
        <tr>
            <td><strong>论坛简介</strong></td>
            <td><textarea name="forum_description" cols="30" rows="5"></textarea></td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" class="btn" value="添加">
                <input type="reset" name="submit2" class="btn" value="重置">
            </td>
        </tr>
    </table>
</form>
</body>
</html>