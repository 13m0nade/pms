<?php
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
session_start();
include ('mysqli_connect.php');
$userid=$_SESSION['userid'];
$sql="select AName from admin_login where AID={$userid}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>物业 || 管理员密码修改</title>
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
            <a class="navbar-brand" href="#">物业管理系统</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li ><a href="admin_index.php">主页</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">公告管理<b class="caret"></b>
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
                <li class="active"><a href="admin_repass.php" >密码修改</a></li>
                <li><a href="index.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<h3 style="text-align: center"><?php echo $userid;  ?>号管理员，您好</h3><br/>
<h4 style="text-align: center">修改您的密码：</h4><br/><br/><br/><br/><br/>
<form action="admin_repass.php" method="post"  style="text-align: center">
    <label><input type="password" name="pass1" placeholder="请输入新的密码" class="form-control"></label><br/><br/><br/>
    <label><input type="password" name="pass2" placeholder="确认新的密码" class="form-control"></label><br/><br/>
    <input type="submit" value="提交" class="btn btn-default">
    <input type="reset" value="重置"  class="btn btn-default">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $passa = $_POST["pass1"];
    $passb = $_POST["pass2"];
    if($passa==$passb){
        $sql="update admin_login set pwd='{$passa}' where AID={$userid}";
        $res=mysqli_query($dbc,$sql);
        if($res==1)
        {
            echo "<script>alert('密码修改成功！请重新登陆！')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }
    else{
        echo "<script>alert('两次输入密码不同，请重新输入！')</script>";
    }
}
?>
</body>
</html>