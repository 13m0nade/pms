<?php
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$sql="select PName from proprietor where PID ={$userid}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的物业系统 || 我的信息</title>
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
                <li class="active"><a href="user_index.php">主页</a></li>
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
    <?php
    $sqla="select * from  information where PID ={$userid} ;";
    $resa=mysqli_query($dbc,$sqla);
    $resulta=mysqli_fetch_array($resa);
    ?>
<div class="col-xs-5 col-md-offset-3" style="position: relative;top: 25%">
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">我的信息</h3>
    </div>
    <div class="panel-body">
        <a href="#" class="list-group-item"><?php echo "<p>业主编号:{$resulta['PID']}</p><br/>"; ?></a>
        <a href="#" class="list-group-item"><?php  echo "<p>业主姓名:{$resulta['PName']}</p><br/>";  ?></a>
        <a href="#" class="list-group-item"><?php    echo "<p>楼号:{$resulta['buildingNO']}</p><br/>"; ?></a>
        <a href="#" class="list-group-item"><?php echo "<p>单元号:{$resulta['Unit']}</p><br/>";  ?></a>
        <a href="#" class="list-group-item"><?php echo "<p>房间号:{$resulta['roomNO']}</p><br/>";  ?></a>
        <a href="#" class="list-group-item"><?php    echo "<p>电话:{$resulta['PhoneNumber']}</p><br/>"; ?></a>
        <?php echo "<a style='color: #AA0000;font-size: larger' href='user_info_edit.php'><strong>修改</strong></a>"; ?>
    </div>
</div>
</div>
</body>
</html>