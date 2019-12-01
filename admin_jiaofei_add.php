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
    <title>物业 || 增加信息</title>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">物业管理系统</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="admin_index.php">主页</a></li>
                <li class="dropdown">
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
<h1 style="text-align: center"><strong>增加缴费信息
    </strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_jiaofei_add.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">缴费单号</span><input name="pay_ID" type="text" placeholder="请输入缴费单号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">缴费情况</span><input name="pay_state" type="text" placeholder="请输入缴费情况" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">用户号</span><input name="PID" type="text" placeholder="请输入用户号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">用户名</span><input name="PName" type="text" placeholder="请输入用户名" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">用水量</span><input name="Wdegree" type="text" placeholder="请输入用水量" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">用电量</span><input name=Edegree type="text" placeholder="请输入用电量" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">使用煤气量</span><input name="Gdegree" type="text" placeholder="请输入使用煤气量" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">水费</span><input name="Wcost" type="text" placeholder="请输入水费" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">电费</span><input name="Ecost" type="text" placeholder="请输入电费" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">煤气费</span><input name="Gcost" type="text" placeholder="请输入煤气费" class="form-control"></div><br/>
            <input type="submit" value="添加" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $pay_ID = $_POST["pay_ID"];
    $pay_state= $_POST["pay_state"];
    $PID = $_POST["PID"];
    $PName = $_POST["PName"];
    $Wdegree= $_POST["Wdegree"];
    $Edegree= $_POST["Edegree"];
    $Gdegree= $_POST["Gdegree"];
    $Wcost= $_POST["Wcost"];
    $Ecost= $_POST["Ecost"];
    $Gcost= $_POST["Gcost"];
    $sqla="insert into pay VALUES ('{$pay_ID}' ,'{$pay_state}','{$PID}','{PName}','{$Wdegree}','{$Edegree}','{$Gdegree}','{$Wcost}','{$Ecost}','{$Gcost}','1')";
    $resa=mysqli_query($dbc,$sqla);
    if($resa==1)
    {
        echo "<script>alert('缴费信息添加成功！')</script>";
        echo "<script>window.location.href='admin_jiaofei.php'</script>";
    }
    else
    {
        echo "<script>alert('添加失败！请重新输入！');</script>";
    }
}
?>
</body>
</html>
