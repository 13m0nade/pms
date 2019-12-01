<?php
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
@include_once("G:/phpStudy_64/phpstudy_pro/WWW/pms/waf.php");
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$xgid=$_GET['id'];
$sqlb="select announcement_ID,Title,Date,Content,AID from announcement where announcement_ID={$xgid}";
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
    <title>物业 || 公告信息修改</title>
</head>
<body>
<h1 style="text-align: center"><strong>公告信息修改</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_gonggao_edit.php?id=<?php echo $xgid; ?>"" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
    <div id="login">
        <div class="input-group"><span  class="input-group-addon">公告号</span><input value="<?php echo $resultb['announcement_ID']; ?>" name="announcement_ID" type="text" placeholder="请输入修改的公告" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">标题</span><input value="<?php echo $resultb['Title']; ?>" name="Title" type="text" placeholder="请输入修改的标题" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">发布日期</span><input value="<?php echo $resultb['Date']; ?>"  name="Date" type="text" placeholder="请输入修改的发布日期" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">内容</span><input value="<?php echo $resultb['Content']; ?>" name="Content" type="text" placeholder="请输入修改的内容" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">发布人</span><input  value="<?php echo $resultb['AID']; ?>" name="AID" type="text" placeholder="请输入新的发布人" class="form-control"></div><br/>
        <label><input type="submit" value="确认" class="btn btn-default"></label>
        <label><input type="reset" value="重置" class="btn btn-default"></label>
    </div>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $boid=$_GET['id'];
    $announcement_ID = $_POST["announcement_ID"];
    $Title = $_POST["Title"];
    $Date = $_POST["Date"];
    $Content = $_POST["Content"];
    $AID = $_POST["AID"];
    $sqla="update announcement set announcement_ID='{$announcement_ID}',Title='{$Title}',Date='{$Date}',
Content='{$Content}',AID='{$AID}' where announcement_ID=$boid;";
    $resa=mysqli_query($dbc,$sqla);
    if($resa==1)
    {
        echo "<script>alert('修改成功！')</script>";
        echo "<script>window.location.href='admin_gonggao.php'</script>";
    }
    else
    {
        echo "<script>alert('修改失败！请重新输入！');</script>";
    }
}
?>
</body>
</html>
