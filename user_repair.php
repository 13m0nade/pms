<?php
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$sql="select PName from repair where PID={$userid}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的物业系统 || 报修</title>
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
<h3 style="text-align: center"><?php echo $result['PName'];  ?>  先生/女士，您好</h3><br/>
<h4 style="text-align: center">您当前报修状态为：<br/>
<?php
$sqla="select state from repair where PID ={$userid} ;";
$resa=mysqli_query($dbc,$sqla);
$resulta=mysqli_fetch_array($resa);
if($resulta['state']==0) echo "未报修<br/><br/><a href='user_repair_do.php?id=0' style='text-align: center'>点此报修</a>";
else echo "报修<br/><br/><a href='user_repair_do.php?id=1' style='text-align: center'>点此取消报修</a>";
?>
</h4>
</body>
</html>