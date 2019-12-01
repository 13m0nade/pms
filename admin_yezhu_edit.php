<?php
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$readerid=$_GET['id'];
$sqlb="select * from proprietor where PID={$readerid}";
$resb=mysqli_query($dbc,$sqlb);
$resultb=mysqli_fetch_array($resb);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>物业 || 业主信息修改</title>
</head>
<body>
<h1 style="text-align: center"><strong>业主信息修改</strong></h1><br/><br/><br/>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_yezhu_edit.php?id=<?php echo $readerid; ?>" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">业主编号</span><input name="PID" value="<?php echo $resultb['PID'] ;?>" type="text" placeholder="请输入修改的业主编号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">业主姓名</span><input name="PName" value="<?php echo $resultb['PName'] ;?>" type="text" placeholder="请输入修改的业主姓名" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">房间号</span><input name="roomNO" value="<?php echo $resultb['roomNO'] ;?>" type="text" placeholder="请输入修改的房间号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">车牌号</span><input name="carNO" value="<?php echo $resultb['carNO'] ;?>" type="text" placeholder="请输入修改的车牌号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">电话</span><input name="PhoneNumber" value="<?php echo $resultb['PhoneNumber'] ;?>" type="text" placeholder="请输入修改的电话" class="form-control"></div><br/>
            <input type="submit" value="确认" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $readid=$_GET['id'];
    $PID = $_POST["PID"];
    $PName= $_POST["PName"];
    $roomNO = $_POST["roomNO"];
    $carNO= $_POST["carNO"];
    $PhonerNumber= $_POST["PhoneNumber"];
    $sqla="update proprietor set PID='{$PID}',PName='{$PName}',roomNO='{$roomNO}',carNO='{$carNO}' where PID=$readid;";
    $resa=mysqli_query($dbc,$sqla);
    if($resa==1)
    {
        echo "<script>alert('修改成功！')</script>";
        echo "<script>window.location.href='admin_yezhu.php'</script>";
    }
    else
    {
        echo "<script>alert('修改失败！请重新输入！');</script>";
    }
}
?>
</body>
</html>
