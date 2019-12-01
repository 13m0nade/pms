<?php
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$sql="select PName from user_login where PID={$userid}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
date_default_timezone_set("PRC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的物业系统</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            width: 100%;
            overflow: hidden;
            background: url("300046-106.jpg") no-repeat;
            background-size:cover;
            color: antiquewhite;
        }
        #gonggao{
            position: absolute;
            left: 40%;
            top: 50%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">我的物业系统</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="reader_index.php">主页</a></li>
                <li><a href="user_announce.php">公告查询</a></li>
                <li><a href="user_pay.php">我的缴费</a></li>
                <li><a href="user_info.php">个人信息</a></li>
                <li><a href="user_repass.php">密码修改</a></li>
                <li><a href="user_repair.php">报修</a></li>
                <li><a href="index.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<br/><br/><h3 style="text-align: center"><?php echo $result['PName'];  ?> 先生/女士，您好</h3><br/>
<div id="bot" style="text-align: center;font-size:40px;position:absolute;left:32%;bottom:30px "><i style="text-align: center"> 欢  迎  来  到  物  业  管  理  系  统 </i></div>
</body>
</html>
