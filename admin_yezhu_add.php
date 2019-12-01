<?php
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>物业管理 || 增加业主</title>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">物业管理系统</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li ><a href="admin_index.php">主页</a></li>
                <li class="active" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">公告<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_gonggao.php">全部公告</a></li>
                        <li><a href="admin_gonggao_add.php">增加公告</a></li>
                    </ul>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">业主管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_yezhu.php">业主信息</a></li>
                        <li><a href="admin_yezhu_add.php">增加业主</a></li>
                    </ul>
                </li>
                <li class="active" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">缴费管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_jiaofei.php">缴费信息</a></li>
                        <li><a href="admin_jiaofei_add.php">增加信息</a></li>
                    </ul>
                </li>
                <li><a href="admin_repass.php">密码修改</a></li>
                <li><a href="index.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>增加业主</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_yezhu_add.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">业主编号</span><input name="PID" type="text" placeholder="请输入业主编号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">业主姓名</span><input name="PName" type="text" placeholder="请输入业主姓名" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">房间号</span><input name="roomNO" type="text" placeholder="请输入房间号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">车牌号</span><input name="carNO" type="text" placeholder="请输入车牌号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">电话</span><input name="PhoneNumber" type="text" placeholder="请输入电话" class="form-control"></div><br/>
            <input type="submit" value="添加" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nnid = $_POST["PID"];
    $nnam= $_POST["PName"];
    $nsex = $_POST["roomNO"];
    $nbir= $_POST["carNO"];
    $nadd= $_POST["PhoneNumber"];
    $x=strlen($nadd);
    if(is_numeric($nadd)&&$x=== 11)
    {
        $sqla="insert into proprietor VALUES ('{$nnid}' ,'{$nnam}','{$nsex}','{$nbir}','{$nadd}','1')";
        $resa=mysqli_query($dbc,$sqla);
        if($resa==1)
        {
        echo "<script>alert('业主添加成功！初始密码为123456')</script>";
        echo "<script>window.location.href='admin_yezhu.php'</script>";
        }
        else
        {
        echo "<script>alert('添加失败！请重新输入！');</script>";
        }
    }
    else
    {
        echo "<script>alert('非法输入！！！！！');</script>";
    }
}
?>
</body>
</html>
