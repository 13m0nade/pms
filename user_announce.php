<?php
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$sql="select PName from user_login where PID={$userid}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的物业系统 || 公告查询</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        #resbook{
            top:50%;
        }
        #query{
            text-align: center;
        }
        body{
            width: 100%;
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
<h3 style="text-align: center"><?php echo $result['PName'];  ?> 先生/女士，您好</h3><br/>
<h4 style="text-align: center">公告查询：</h4>
<form  action="user_announce.php" method="POST">
    <div id="query">
        <label ><input  name="announcement" type="text" placeholder="请输入公告号或公告日期" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $gjc = $_POST["announcement"];
    if($gjc=="") echo "<script>alert('查询词不能为空！')</script>";
    else{
        $sqla="select announcement_ID,Title,Date,Content,AID from announcement where ( Date like '%{$gjc}%' or announcement_ID like '%{$gjc}%') ;";
        $resa=mysqli_query($dbc,$sqla);
        $jgs=mysqli_num_rows($resa);
        if($jgs==0)  echo "<script>alert('系统内暂无此公告！')</script>";
        else{
            echo "<table   id='annnouncement' class='table'>
    <tr>
         <th>公告号</th>
        <th>公告名</th>
        <th>日期</th>
        <th>内容</th>
        <th>发布者</th>
    </tr>";
            foreach ($resa as $row){
                echo "<tr>";
                echo "<td>{$row['announcement_ID']}</td>";
                echo "<td>{$row['Title']}</td>";
                echo "<td>{$row['Date']}</td>";
                echo "<td>{$row['Content']}</td>";
                echo "<td>{$row['AID']}</td>";
                echo "</tr>";
            };
        };
        echo "</table>";
    }
}
?>
</body>
</html>