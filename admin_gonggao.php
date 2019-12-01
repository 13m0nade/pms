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
    <title>物业 || 公告</title>
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
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">业主管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_yezhu.php">业主信息</a></li>
                        <li><a href="admin_yezhu_add.php">增加业主</a></li>
                    </ul>
                </li>
                <li class="dropdown">
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
<h1 style="text-align: center"><strong>全部公告</strong></h1>
<form  id="query" action="admin_gonggao.php" method="POST">
    <div id="query">
        <label ><input  name="gonggaoquery" type="text" placeholder="请输入时间或公告号" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>
<table  width='100%' class="table table-hover">
    <tr>
        <th>公告号</th>
        <th>标题</th>
        <th>发布日期</th>
        <th>内容</th>
        <th>发布人</th>
        <th>操作</th>
        <th>操作</th>
    </tr>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $gjc = $_POST["gonggaoquery"];//,administrator where announcement.AID=administrator.AID
        $sql="select announcement_ID,Title,Date,Content,AID from announcement where ( Date like '%{$gjc}%' or announcement_ID like '%{$gjc}%')  ;";
    }
    else{//,administrator where announcement.AID=administrator.AID
        $sql="select announcement_ID,Title,Date,Content,AID from announcement;";
    }
    $res=mysqli_query($dbc,$sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['announcement_ID']}</td>";
        echo "<td>{$row['Title']}</td>";
        echo "<td>{$row['Date']}</td>";
        echo "<td>{$row['Content']}</td>";
        echo "<td>{$row['AID']}</td>";
        echo "<td><a href='admin_gonggao_edit.php?id={$row['announcement_ID']}'>修改</a></td>";
        echo "<td><a href='admin_gonggao_del.php?id={$row['announcement_ID']}'>删除</a></td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>
