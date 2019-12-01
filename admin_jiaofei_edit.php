<?php
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$readerid=$_GET['id'];
$sqlb="select * from pay where PID={$readerid}";
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
    <title>物业 || 缴费信息修改</title>
</head>
<body>
<h1 style="text-align: center"><strong>缴费信息修改</strong></h1><br/><br/><br/>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_jiaofei_edit.php?id=<?php echo $readerid; ?>" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">缴费单号</span><input name="pay_ID" value="<?php echo $resultb['pay_ID'] ;?>" type="text" placeholder="请输入修改的缴费单号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">缴费情况</span><input name="pay_state" value="<?php echo $resultb['pay_state'] ;?>" type="text" placeholder="请输入修改的缴费情况" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">用户号</span><input name="PID" value="<?php echo $resultb['PID'] ;?>" type="text" placeholder="请输入修改的用户号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">用水量</span><input name="Wdegree" value="<?php echo $resultb['Wdegree'] ;?>" type="text" placeholder="请输入修改的用水量" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">用电量</span><input name="Edegree" value="<?php echo $resultb['Edegree'] ;?>" type="text" placeholder="请输入修改的用电量" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">使用煤气量</span><input name="Gdegree" value="<?php echo $resultb['Gdegree'] ;?>" type="text" placeholder="请输入修改的煤气量" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">水费</span><input name="Wcost" value="<?php echo $resultb['Wcost'] ;?>" type="text" placeholder="请输入修改的水费" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">电费</span><input name="Ecost" value="<?php echo $resultb['Ecost'] ;?>" type="text" placeholder="请输入修改的电费" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">煤气费</span><input name="Gcost" value="<?php echo $resultb['Gcost'] ;?>" type="text" placeholder="请输入修改的煤气费" class="form-control"></div><br/>
            <input type="submit" value="确认" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $readid=$_GET['id'];
    $pay_ID = $_POST["pay_ID"];
    $pay_state= $_POST["pay_state"];
    $PID = $_POST["PID"];
    $Wdegree= $_POST["Wdegree"];
    $Edegree= $_POST["Edegree"];
    $Gdegree= $_POST["Gdegree"];
    $Wcost= $_POST["Wcost"];
    $Ecost= $_POST["Ecost"];
    $Gcost= $_POST["Gcost"];
    $sqla="update pay set pay_ID='{$pay_ID}',pay_state='{$pay_state}',PID='{$PID}',
Wdegree='{$Wdegree}',Edegree='{$Edegree}',Gdegree='{$Gdegree}',Wcost='{$Wcost}',Ecost='{$Ecost}',Gcost='{$Gcost}' where PID=$readid;";
    $resa=mysqli_query($dbc,$sqla);
    if($resa==1)
    {
        echo "<script>alert('修改成功！')</script>";
        echo "<script>window.location.href='admin_jiaofei.php'</script>";
    }
    else
    {
        echo "<script>alert('修改失败！请重新输入！');</script>";
    }
}
?>
</body>
</html>
