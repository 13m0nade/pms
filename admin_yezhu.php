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
    <title>物业 || 业主管理</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            width: 100%;
            height:auto;
        }
        #query{
            text-align: center;
        }
    </style>
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
<h1 style="text-align: center"><strong>全部业主</strong></h1>
<form  id="query" action="admin_yezhu.php" method="POST">
    <div id="query">
        <label ><input  name="yezhuquery" type="text" placeholder="请输入业主姓名或者用户号" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>
<table  width='100%' class="table table-hover">
    <tr>
        <th>业主编号</th>
        <th>业主姓名</th>
        <th>房间号</th>
        <th>车牌号</th>
        <th>电话</th>
    </tr>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $gjc = $_POST["yezhuquery"];
        $sql="select PID,PName,roomNO,carNO,PhoneNumber from proprietor where ( PID like '%{$gjc}%' or PName like '%{$gjc}%')  ;";
    }
    else{
        $sql="select PID,PName,roomNO,carNO,PhoneNumber from proprietor;";
    }
    $res=mysqli_query($dbc,$sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['PID']}</td>";
        echo "<td>{$row['PName']}</td>";
        echo "<td>{$row['roomNO']}</td>";
        echo "<td>{$row['carNO']}</td>";
        echo "<td>{$row['PhoneNumber']}</td>";
        echo "<td><a href='admin_yezhu_edit.php?id={$row['PID']}'>修改</a></td>";
        echo "<td><a href='admin_yezhu_del.php?id={$row['PID']}'>删除</a></td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>