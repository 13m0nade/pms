<?php
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$sqlb="select * from information where PID ={$userid} ;";
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
    <title>物业系统 || 个人信息修改</title>
</head>
<body>
<h1 style="text-align: center"><strong>个人信息修改</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="user_info_edit.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
    <div id="login">
        <div class="input-group"><span  class="input-group-addon">编号</span><input value="<?php echo $resultb['PID']; ?>" name="PID" type="text" placeholder="请输入新的的业主编号" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">姓名</span><input value="<?php echo $resultb['PName']; ?>" name="PName" type="text" placeholder="请输入修改的姓名" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">楼号</span><input value="<?php echo $resultb['buildingNO']; ?>" name="buildingNO" type="text" placeholder="请输入新的楼号" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">单元号</span><input  value="<?php echo $resultb['Unit']; ?>" name="Unit" type="text" placeholder="请输入新的单元号" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">房间号</span><input  value="<?php echo $resultb['roomNO']; ?>" name="roomNO" type="text" placeholder="请输入新的房间号" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">电话</span><input  value="<?php echo $resultb['PhoneNumber']; ?>" name="PhoneNumber" type="text" placeholder="请输入新的电话号" class="form-control"></div><br/>
        <label><input type="submit" value="确认" class="btn btn-default"></label>
        <label><input type="reset" value="重置" class="btn btn-default"></label>
    </div>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nid = $_POST["PID"];
    $nname = $_POST["PName"];
    $nbno = $_POST["buildingNO"];
    $nuno = $_POST["Unit"];
    $nrno = $_POST["roomNO"];
    $npno = $_POST["PhoneNumber"];
    $x=strlen($npno);
    if(is_numeric($npno)&&$x=== 11)
    {
    	$sqla="update information set PName = '{$nname}',PhoneNumber = '{$npno}' where PID ={$userid};";
    	$resa=mysqli_query($dbc,$sqla);
    	if($resa==1)
    	{
        echo "<script>alert('修改成功！')</script>";
        echo "<script>window.location.href='user_info.php'</script>";
    	}
    	else
    	{
        echo "<script>alert('修改失败！请重新输入！');</script>";
    	}
    } 
    else
    	{
        echo "<script>alert('非法输入！！！！');</script>";
    	}
}
?>
</body>
</html>
